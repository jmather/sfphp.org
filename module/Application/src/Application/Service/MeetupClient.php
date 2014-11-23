<?php

namespace Application\Service;

use DMS\Service\Meetup\AbstractMeetupClient;
use Guzzle\Common\Collection;

class MeetupClient extends AbstractMeetupClient
{

    /**
     * Returns the default values for incoming configuration parameters
     *
     * @return array
     */
    public static function getDefaultParameters()
    {
        return array(
            'base_url' => '{scheme}://api.meetup.com/',
            'scheme'   => 'https',
        );
    }

    /**
     * Defines the configuration parameters that are required for client
     *
     * @return array
     */
    public static function getRequiredParameters()
    {
        return array(
            'access_token'
        );
    }

    /**
     * Factory Method to build new Client
     *
     * @param array $config
     * @return MeetupOAuthClient
     */
    public static function factory($config = array())
    {
        $configuration = static::buildConfig($config);

        $client = new self($configuration->get('base_url'), $configuration);

        static::loadDefinitions($client);

        return $client;
    }

    /**
     * Builds array of configurations into final config
     *
     * @param array $config
     * @return Collection
     */
    public static function buildConfig($config = array())
    {
        $default  = static::getDefaultParameters();
        $required = static::getRequiredParameters();
        $config = Collection::fromConfig($config, $default, $required);

        $standardHeaders = array(
            'Accept-Charset' => 'utf-8',
            'Authorization' => 'Bearer ' . $config['access_token'],
        );

        $requestOptions = array(
            'headers' => $standardHeaders,
        );

        $config->add('request.options', $requestOptions);

        return $config;
    }
}
