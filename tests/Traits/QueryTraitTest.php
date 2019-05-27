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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestQueryTrait;

/**
 * Query trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class QueryTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestQueryTrait();

        $this->assertNull($obj->getQuery());
    }

    /**
     * Tests the setQuery() method.
     *
     * @return void
     */
    public function testSetQuery() {

        $obj = new TestQueryTrait();

        $obj->setQuery("query");
        $this->assertEquals("query", $obj->getQuery());
    }
}
