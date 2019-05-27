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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestMaxWidthTrait;

/**
 * Max width trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class MaxWidthTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestMaxWidthTrait();

        $this->assertNull($obj->getMaxWidth());
    }

    /**
     * Tests the setMaxWidth() method.
     *
     * @return void
     */
    public function testSetMaxWidth() {

        $obj = new TestMaxWidthTrait();

        $obj->setMaxWidth(1920);
        $this->assertEquals(1920, $obj->getMaxWidth());
    }
}
