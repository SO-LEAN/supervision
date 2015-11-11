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
     * Returns useful information for Ping request.
     *
     * @return array
     */
    public function ping()
    {
        return [
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
