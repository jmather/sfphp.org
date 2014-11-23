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
        try {
            $self = $this->getMeetupClient()->getMember(['id' => 'self'])->toArray();
        } catch (\Exception $e) {
            return new Result(Result::FAILURE, null, []);
        }
        $member = $this->getObjectManager()->getRepository('Db\Entity\Member')->find($self['id']);

        if (!$member) {
            $member = new Entity\Member();
            $member->setId($self['id']);
            $member->setCreatedAt(new \DateTime());
            $this->getObjectManager()->persist($member);

            $userRole = $this->getObjectManager()->getRepository('Db\Entity\Role')->findOneBy([
                'roleId' => 'user',
            ]);

            $userRole->addMember($member);
            $member->addRole($userRole);
        }

        $member->exchangeArray($self);
        $this->getObjectManager()->flush();

        return new Result(Result::SUCCESS, $member, []);
    }
}
