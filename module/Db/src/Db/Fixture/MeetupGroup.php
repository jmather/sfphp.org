<?php

namespace Blitzy\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Db\Entity;

class MeetupGroup implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $group = new Entity\MeetupGroup();
        $group->setName('sf-php');
        $group->setId(12345);

        $manager->persist($group);
        $manager->flush();
    }
}
