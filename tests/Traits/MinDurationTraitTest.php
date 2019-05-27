<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Traits;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestMinDurationTrait;

/**
 * Min duration trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class MinDurationTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestMinDurationTrait();

        $this->assertNull($obj->getMinDuration());
    }

    /**
     * Tests the setMinDuration() method.
     *
     * @return void
     */
    public function testSetMinDuration() {

        $obj = new TestMinDurationTrait();

        $obj->setMinDuration(1);
        $this->assertEquals(1, $obj->getMinDuration());
    }
}
