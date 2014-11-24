<?php

namespace Application\Authentication\Adapter;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AdapterInterface;
use Application\Service\MeetupClient;
use Db\Entity;

class Meetup implements AdapterInterface
{
    use \DoctrineModule\Persistence\ProvidesObjectManager;

    private $meetupClient;

    public function getMeetupClient()
    {
        return $this->meetupClient;
    }

    public function setMeetupClient(MeetupClient $client)
    {
        $this->meetupClient = $client;

        return $this;
    }

    public function authenticate()
    {
        if (!$this->getMeetupClient()) {
            return new Result(Result::FAILURE, null, []);
        }

        try {
            $self = $this->getMeetupClient()->getMember(['id' => 'self'])->toArray();
        } catch (\Exception $e) {
            return new Result(Result::FAILURE, null, []);
        }
        $member = $this->getObjectManager()->getRepository('Db\Entity\Member')->find($self['id']);

        if (!$member) {
            $addAdministrator = false;
            // Special handling if this is the first user in the system
            if (!sizeof($this->getObjectManager()->getRepository('Db\Entity\Member')->findAll())) {
                $addAdministrator = true;
            }

            $member = new Entity\Member();
            $member->setId($self['id']);
            $member->setCreatedAt(new \DateTime());
            $this->getObjectManager()->persist($member);

            $memberRole = $this->getObjectManager()->getRepository('Db\Entity\Role')->findOneBy([
                'roleId' => 'member',
            ]);

            $memberRole->addMember($member);
            $member->addRole($memberRole);

            // Member is first; make admin
            if ($addAdministrator) {
                $administratorRole = $this->getObjectManager()->getRepository('Db\Entity\Role')->findOneBy([
                    'roleId' => 'administrator',
                ]);

                $administratorRole->addMember($member);
                $member->addRole($administratorRole);
            }
        }

        $member->exchangeArray($self);
        $this->getObjectManager()->flush();

        return new Result(Result::SUCCESS, $member, []);
    }
}
