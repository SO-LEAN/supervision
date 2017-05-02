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

use Symfony\Component\HttpKernel\Kernel;
use \DateTime;
/**
 * Class SymfonyDataProvider
 *
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class SymfonyDataProvider implements DataProvider
{
    /**
     *  return array
     */
    public function provide()
    {
        $endOfMaintenance = implode('-', array_reverse(explode('/', kernel::END_OF_MAINTENANCE)));
        $endOfLife = implode('-', array_reverse(explode('/', kernel::END_OF_LIFE)));
        return [
            'symfony' => [
                'version'           => Kernel::VERSION,
                'version_id'        => Kernel::VERSION_ID,
                'major_version'     => Kernel::MAJOR_VERSION,
                'minor_version'     => kernel::MINOR_VERSION,
                'release_version'   => kernel::RELEASE_VERSION,
                'extra_version'     => kernel::EXTRA_VERSION,
                'end_of_maintenance'=> (new DateTime('last day of '.$endOfMaintenance)),
                'end_of_life'       => (new DateTime('last day of '.$endOfLife)),
            ]
        ];
    }
}
