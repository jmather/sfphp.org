<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

$timezone = 'UTC';
date_default_timezone_set($timezone);

return array(
    'audit' => array(
        'datetimeFormat' => 'r',
        'paginatorLimit' => 20,

        'tableNamePrefix' => '',
        'tableNameSuffix' => '_audit',
        'revisionTableName' => 'Revision',
        'revisionEntityTableName' => 'RevisionEntity',

        'authenticationService' => 'Zend\Authentication\AuthenticationService',
        'userEntityClassName' => 'Db\Entity\Member',

        'entities' => array(
            'Db\Entity\Member' => array(
                'route' => 'member',
                'defaults' => array(
                    'controller' => 'Station\Controller\Member',
                    'action' => 'index',
                ),
            ),
            'Db\Entity\Page' => array(
                'route' => 'page-by-id',
                'defaults' => array(
                    'controller' => 'ContentManagement\Controller\Page',
                    'action' => 'page',
                ),
            ),
            'Db\Entity\Role' => array(),
        ),
    ),
);
