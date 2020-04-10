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
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestStringPrevPageTrait;

/**
 * String prev page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class StringPrevPageTraitTest extends AbstractTestCase {

    /**
     * Tests the setPrevPage() method.
     *
     * @return void
     */
    public function testSetPrevPage() {

        $obj = new TestStringPrevPageTrait();

        $obj->setPrevPage("prevPage");
        $this->assertEquals("prevPage", $obj->getPrevPage());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestStringPrevPageTrait();

        $this->assertNull($obj->getPrevPage());
    }
}
