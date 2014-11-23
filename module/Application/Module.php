<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Application\Service\MeetupClient;
use Zend\Session\Container;
use Exception;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $session = $e->getApplication()
            ->getServiceManager()
            ->get('Zend\Session\SessionManager');
        $session->start();
    }

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'MeetupClient' => function (ServiceManager $serviceManager) {
                    $container = new Container('oauth2');
                    if (isset($container->accessToken)) {
                        $accessToken = $container->accessToken;
                    } else {
                        throw new Exception('The oauth2 session is not configured');
                    }

                    $client = MeetupClient::factory(['access_token' => $accessToken]);

                    return $client;
                },

                'MeetupProviderIdentity' => function (ServiceManager $serviceManager) {
                    $provider = new \Application\Provider\Identity\Meetup();
                    $provider->setObjectManager($serviceManager->get('doctrine.entitymanager.orm_default'));

                    return $provider;
                },

                'MeetupAuthAdapter' => function (ServiceManager $serviceManager) {
                    $adapter = new \Application\Authentication\Adapter\Meetup();
                    $adapter->setObjectManager($serviceManager->get('doctrine.entitymanager.orm_default'));
                    $adapter->setMeetupClient($serviceManager->get('MeetupClient'));

                    return $adapter;
                },
            ),
        );
    }
}
