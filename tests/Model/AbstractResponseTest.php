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
     * Tests the setRawResponse() method.
     *
     * @return void
     */
    public function testSetRawResponse() {

        $obj = new TestResponse();

        $obj->setRawResponse("rawResponse");
        $this->assertEquals("rawResponse", $obj->getRawResponse());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new TestResponse();

        $this->assertNull($obj->getLimit());
        $this->assertNull($obj->getRemaining());
        $this->assertNull($obj->getReset());
        $this->assertNull($obj->getRawResponse());
    }
}
