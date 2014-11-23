<?php

namespace Application\Provider\Identity;

use Zend\Authentication\AuthenticationService;
use BjyAuthorize\Provider\Identity\ProviderInterface;

class Meetup implements ProviderInterface
{
    use \DoctrineModule\Persistence\ProvidesObjectManager;

    public function getIdentityRoles()
    {
        $authService = new AuthenticationService();

        $return = ['guest'];
        if ($authService->hasIdentity()) {
            $user = $this->getObjectManager()->getRepository('Db\Entity\Member')->find($authService->getIdentity()->getId());

            // Update user last Request At anytime roles are loaded
            $user->setLastRequestAt(new \DateTime());
            $this->getObjectManager()->flush();

            foreach ($user->getRole() as $role) {
                $return[] = $role->getRoleId();
            }
        }

        return $return;
    }
}
