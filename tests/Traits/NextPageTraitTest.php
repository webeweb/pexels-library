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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestNextPageTrait;

/**
 * Next page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class NextPageTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestNextPageTrait();

        $this->assertNull($obj->getNextPage());
    }

    /**
     * Tests the setNextPage() method.
     *
     * @return void
     */
    public function testSetNextPage() {

        $obj = new TestNextPageTrait();

        $obj->setNextPage("nextPage");
        $this->assertEquals("nextPage", $obj->getNextPage());
    }
}
