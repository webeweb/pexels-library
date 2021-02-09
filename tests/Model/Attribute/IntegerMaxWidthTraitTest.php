<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Attribute;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestIntegerMaxWidthTrait;

/**
 * Integer max width trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class IntegerMaxWidthTraitTest extends AbstractTestCase {

    /**
     * Tests the setMaxWidth() method.
     *
     * @return void
     */
    public function testSetMaxWidth(): void {

        $obj = new TestIntegerMaxWidthTrait();

        $obj->setMaxWidth(1920);
        $this->assertEquals(1920, $obj->getMaxWidth());
    }
}
