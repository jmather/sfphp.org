<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Station\Controller\Member' => 'Station\Controller\MemberController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'member' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/member',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Station\Controller',
                        'controller'    => 'Member',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
);