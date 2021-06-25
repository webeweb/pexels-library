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
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestStringSizeTrait;

/**
 * String size trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class StringSizeTraitTest extends AbstractTestCase {

    /**
     * Tests the setSize() method.
     *
     * @return void
     */
    public function testSetSize(): void {

        $obj = new TestStringSizeTrait();

        $obj->setSize("size");
        $this->assertEquals("size", $obj->getSize());
    }
}
