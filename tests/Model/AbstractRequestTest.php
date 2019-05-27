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
use WBW\Library\Pexels\Tests\Fixtures\Model\TestRequest;

/**
 * Abstract request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model
 */
class AbstractRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @retunr void.
     */
    public function testConstruct() {

        $obj = new TestRequest();

        $this->assertNull($obj->getAuthorization());
    }

    /**
     * Tests the setAuthorization() method.
     *
     * @retunr void.
     */
    public function testSetAuthorization() {

        $obj = new TestRequest();

        $obj->setAuthorization("authorization");
        $this->assertEquals("authorization", $obj->getAuthorization());
    }

    /**
     * Tests the setQuery() method.
     *
     * @retunr void.
     */
    public function testSetQuery() {

        $obj = new TestRequest();

        $obj->setQuery("query");
        $this->assertEquals("query", $obj->getQuery());
    }
}
