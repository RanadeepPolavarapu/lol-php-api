<?php

namespace EloGank\Api\Component\Controller;

use EloGank\Api\Client\LOLClientInterface;
use EloGank\Api\Manager\ApiManager;

/**
 * @author Sylvain Lorinet <sylvain.lorinet@gmail.com>
 */
abstract class Controller
{
    /**
     * @var \EloGank\Api\Manager\ApiManager
     */
    private $apiManager;


    /**
     * @param ApiManager $apiManager
     */
    public function __construct(ApiManager $apiManager)
    {
        $this->apiManager = $apiManager;
    }

    /**
     * @return LOLClientInterface
     */
    protected function getClient()
    {
        return $this->apiManager->getClient();
    }

    /**
     * @param string $route
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function call($route, array $parameters = array())
    {
        return $this->apiManager->getRouter()->process($this->apiManager, array(
            'route'      => $route,
            'parameters' => $parameters
        ));
    }
}