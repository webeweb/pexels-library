<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Response;

use WBW\Library\Pexels\Model\Collection;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\CollectionsResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collections response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class CollectionsResponseTest extends AbstractTestCase {

    /**
     * Tests addCollection()
     *
     * @return void
     */
    public function testAddCollection(): void {

        // Set a Collection mock.
        $collection = new Collection();

        $obj = new CollectionsResponse();

        $obj->addCollection($collection);
        $this->assertSame($collection, $obj->getCollections()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new CollectionsResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertEquals([], $obj->getCollections());
        $this->assertNull($obj->getPrevPage());
        $this->assertNull($obj->getTotalResults());
    }
}
