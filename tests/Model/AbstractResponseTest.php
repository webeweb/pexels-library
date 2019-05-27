<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Model\TestResponse;

/**
 * Abstract response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model
 */
class AbstractResponseTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestResponse();

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());
    }

    /**
     * Tests the setNextPage() method.
     *
     * @return void
     */
    public function testSetNextPage() {

        $obj = new TestResponse();

        $obj->setNextPage("nextPage");
        $this->assertEquals("nextPage", $obj->getNextPage());
    }

    /**
     * Tests the setTotalResults() method.
     *
     * @return void
     */
    public function testSetTotalResults() {

        $obj = new TestResponse();

        $obj->setTotalResults(236);
        $this->assertEquals(236, $obj->getTotalResults());
    }
}
