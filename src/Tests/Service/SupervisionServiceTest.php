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

use PHPUnit_Framework_TestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 *
 * @group supervision
 */
class SupervisionServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SupervisionService
     */
    protected $s;
    /**
     *
     */
    public function setUp()
    {
        $this->s = new SupervisionService();
    }
    /**
     * @group unit
     */
    public function testConstruct()
    {
        $this->assertNotNull($this->s);
    }
    /**
     * @group unit
     */
    public function testPing()
    {
        $r = $this->s->ping();

        $this->assertEquals(PHP_OS, $r['php']['os']);
    }
}
