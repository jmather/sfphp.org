<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Stuki\OAuth2\Client;
use Zend\Session\Container;
use Zend\Authentication\AuthenticationService;

class MemberController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();

        return $this->plugin('redirect')->toRoute('home');
    }

    public function LoginAction()
    {
        $config = $this->getServiceLocator()->get('Config');

        $provider = new Client\Provider\Meetup(array(
            'clientId' => $config['meetup']['key'],
            'clientSecret' => $config['meetup']['secret'],
            'redirectUri' => $config['meetup']['redirect'],
        ));

        if (! $this->params()->fromQuery('code')) {
            // No authorization code; send user to get one
            // Some providers support and/or require an application state token
            return $this->plugin('redirect')->toUrl($provider->getAuthorizationUrl(array('state' => 'token')));
        } else {
            try {
                // Get an authorization token
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code'],
                ]);
            } catch (Client\Exception\IDPException $e) {
                // Handle error from oauth2 server
            }

            // Store the access and refresh token for future use
            $container = new Container('oauth2');
            $container->accessToken = $token->accessToken;
            $container->refreshToken = $token->refreshToken;

            $auth = new AuthenticationService();
            $etsyAuthAdapter = $this->getServiceLocator()->get('MeetupAuthAdapter');
            $result = $auth->authenticate($etsyAuthAdapter);

            // Redirect to save session
            return $this->plugin('redirect')->toRoute('member');
        }
    }
}
