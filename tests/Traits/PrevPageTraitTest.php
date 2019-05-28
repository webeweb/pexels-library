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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestPrevPageTrait;

/**
 * Prev page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class PrevPageTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestPrevPageTrait();

        $this->assertNull($obj->getPrevPage());
    }

    /**
     * Tests the setPrevPage() method.
     *
     * @return void
     */
    public function testSetPrevPage() {

        $obj = new TestPrevPageTrait();

        $obj->setPrevPage("prevPage");
        $this->assertEquals("prevPage", $obj->getPrevPage());
    }
}
