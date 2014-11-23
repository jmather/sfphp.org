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

        $user = new Entity\Role();
        $user->setParent($guest);
        $user->setRoleId('user');
        $manager->persist($user);

        $administrator = new Entity\Role();
        $administrator->setParent($user);
        $administrator->setRoleId('administrator');
        $manager->persist($administrator);

        $manager->flush();
    }
}
