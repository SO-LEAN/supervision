<?php

/*
 * This file is part of the SUPERVISION package.
 *
 * (c) PHPPRO <opensource@phppro.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phppro\Supervision\Service;

use DateTime;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Supervision Service.
 *
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class SupervisionService
{
    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;
    /**
     * @var array
     */
    protected $dataProviders = [];
    /**
     * @param TokenStorageInterface $tokenStorage
     *
     * @return $this
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;

        return $this;
    }

    /**
     * @param string       $name
     * @param DataProvider $provider
     */
    public function addDataProvider($name, DataProvider $provider)
    {
        $this->dataProviders[$name] = $provider;
    }
    /**
     * Returns useful information for Ping request.
     *
     * @return array
     */
    public function ping()
    {
        $data = [
            'date'          => new Datetime(),
            'startDuration' => defined('APP_TIME_START')
                ? (microtime(true) - constant('APP_TIME_START'))
                : null,
            'php' => [
                'version'   => PHP_VERSION,
                'os'        => PHP_OS,
                'versionId' => PHP_VERSION_ID,
            ],
            'hostName' => gethostname(),
        ];

        foreach ($this->dataProviders as $provider) {
            /**
             * @var DataProvider $provider
             */
            $data += $provider->provide();

        }
        
        return $data;
    }
    /**
     * Returns the current logged in user identity.
     *
     * @return TokenInterface|null
     */
    public function getIdentity()
    {
        if (null == $this->tokenStorage) {
            return null;
        }

        return $this->tokenStorage->getToken();
    }
}
