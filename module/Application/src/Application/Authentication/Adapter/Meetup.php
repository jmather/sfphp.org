<?php

namespace Application\Authentication\Adapter;

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Db\Entity;

class Meetup implements AdapterInterface, ServiceLocatorAwareInterface
{
    use \DoctrineModule\Persistence\ProvidesObjectManager;
    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function authenticate()
    {
        $meetupClient = $this->getServiceLocator()->get('MeetupClient');

        try {
            $self = $meetupClient->getMember(['id' => 'self'])->toArray();
        } catch (\Exception $e) {
            return new Result(Result::ERROR, null, []);
        }
        $member = $this->getObjectManager()->getRepository('Db\Entity\Member')->find($self['id']);

        if (!$member) {
            $member = new Entity\Member;
            $member->setId($self['id']);
            $member->setCreatedAt(new \DateTime());
            $this->getObjectManager()->persist($member);
        }

        $member->exchangeArray($self);
        $this->getObjectManager()->flush();

        return new Result(Result::SUCCESS, $member, []);
    }
}