<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),

    'router' => array(
        'routes' => array(
            'admin' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        'controller'    => 'Admin\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'placeholder' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/create',
                            'defaults' => array(
                                'controller'    => 'Admin\Controller\Index',
                                'action'        => 'create',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
