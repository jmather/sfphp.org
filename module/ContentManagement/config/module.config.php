<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'ContentManagement\Controller\Page' => 'ContentManagement\Controller\PageController'
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'router' => array(
        'routes' => array(
            'page' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/page[/:url-identifier]',
                    'defaults' => array(
                        'controller'    => 'ContentManagement\Controller\Page',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'create' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/create',
                            'defaults' => array(
                                'controller'    => 'ContentManagement\Controller\Page',
                                'action'        => 'create',
                            ),
                        ),
                    ),
                    'edit' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/edit',
                            'defaults' => array(
                                'controller'    => 'ContentManagement\Controller\Page',
                                'action'        => 'edit',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);