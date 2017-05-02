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

/**
 * Interface DataProvider
 *
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface DataProvider
{
    /**
     * @return array
     */
    public function provide();
}
