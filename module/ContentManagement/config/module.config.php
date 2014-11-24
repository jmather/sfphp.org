<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'ContentManagement\Controller\Page' => 'ContentManagement\Controller\PageController',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),

    'view_helpers' => array(
        'invokables' => array(
            'getPages' => 'ContentManagement\View\Helper\GetPages',
        ),
    ),

    'router' => array(
        'routes' => array(
            'page-create' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/page-create',
                    'defaults' => array(
                        'controller'    => 'ContentManagement\Controller\Page',
                        'action'        => 'create',
                    ),
                ),
            ),
            'page' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/page/[:url-identifier][:id]',
                    'defaults' => array(
                        'controller'    => 'ContentManagement\Controller\Page',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
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
                    'delete' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/delete',
                            'defaults' => array(
                                'controller'    => 'ContentManagement\Controller\Page',
                                'action'        => 'delete',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
