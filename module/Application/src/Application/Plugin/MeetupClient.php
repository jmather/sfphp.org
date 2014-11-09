<?php

namespace Application\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use DMS\Service\Meetup\MeetupKeyAuthClient;

class MeetupClient extends AbstractPlugin
{

    /**
     * @var MeetupKeyAuthClient
     */
    protected $client;

    protected $access_key;

    protected $access_secret;

    /**
     * The invoke method for when the controller calls the plugin
     *
     * @throws \RuntimeException
     * @return \DMS\Service\Meetup\MeetupKeyAuthClient
     */
    public function __invoke()
    {
        if (isset($this->client)) {
            return $this->client;
        }

        $config = $this->getController()->getServiceLocator()->get('Config');

//         $this->client = MeetupKeyAuthClient::factory(
//             array(
//                 'consumer_key' => $consumerKey,
//                 'consumer_secret' => $consumerSecret,
//             )
//         );
        return $this->client;
    }

}
