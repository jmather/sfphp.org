<?php

namespace Db\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Db\Entity;

class Role implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $guest = new Entity\Role();
        $guest->setRoleId('guest');
        $manager->persist($guest);

        $member = new Entity\Role();
        $member->setParent($guest);
        $member->setRoleId('member');
        $manager->persist($member);

        $administrator = new Entity\Role();
        $administrator->setParent($member);
        $administrator->setRoleId('administrator');
        $manager->persist($administrator);

        $manager->flush();
    }
}
