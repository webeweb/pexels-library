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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestMinWidthTrait;

/**
 * Min width trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class MinWidthTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestMinWidthTrait();

        $this->assertNull($obj->getMinWidth());
    }

    /**
     * Tests the setMinWidth() method.
     *
     * @return void
     */
    public function testSetMinWidth() {

        $obj = new TestMinWidthTrait();

        $obj->setMinWidth(1280);
        $this->assertEquals(1280, $obj->getMinWidth());
    }
}
