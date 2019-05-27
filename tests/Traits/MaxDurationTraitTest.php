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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestMaxDurationTrait;

/**
 * Max duration trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class MaxDurationTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestMaxDurationTrait();

        $this->assertNull($obj->getMaxDuration());
    }

    /**
     * Tests the setMaxDuration() method.
     *
     * @return void
     */
    public function testSetMaxDuration() {

        $obj = new TestMaxDurationTrait();

        $obj->setMaxDuration(60);
        $this->assertEquals(60, $obj->getMaxDuration());
    }
}
