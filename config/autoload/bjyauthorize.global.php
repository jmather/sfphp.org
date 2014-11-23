<?php

return [
    'bjyauthorize' => array(
        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'MeetupProviderIdentity',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Db\Entity\Role',
            ),
        ),

        'rule_providers' => [
            'BjyAuthorize\Provider\Rule\Config' => [
                'allow' => [
                    [['administrator'], 'administration', 'access'],
                ],
#                'deny' => [
#                ],
            ],
        ],

        'resource_providers' => [
            'BjyAuthorize\Provider\Resource\Config' => [
                'report' => [],
                'team' => [],
                'administration' => [],
            ],
        ],

        'unauthorized_strategy' => 'BjyAuthorizeViewRedirectionStrategy',
        'default_role' => 'guest',

        'guards' => array(
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'home', 'roles' => array('guest')),
                array('route' => 'authentication', 'roles' => array('guest')),
                array('route' => 'authentication/logout', 'roles' => array('user')),
                array('route' => 'authentication/error', 'roles' => array('guest')),

                array('route' => 'admin', 'roles' => array('administrator')),

                array('route' => 'page', 'roles' => array('guest')),
                array('route' => 'page/edit', 'roles' => array('administrator')),
                array('route' => 'page/delete', 'roles' => array('administrator')),
                array('route' => 'page-create', 'roles' => array('administrator')),

                array('route' => 'member', 'roles' => array('user')),
            ),
        ),
    ),
];