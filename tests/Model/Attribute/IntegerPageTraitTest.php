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
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestIntegerPageTrait;

/**
 * Integer page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class IntegerPageTraitTest extends AbstractTestCase {

    /**
     * Tests the setPage() method.
     *
     * @return void
     */
    public function testSetPage() {

        $obj = new TestIntegerPageTrait();

        $obj->setPage(1);
        $this->assertEquals(1, $obj->getPage());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestIntegerPageTrait();

        $this->assertNull($obj->getPage());
    }
}