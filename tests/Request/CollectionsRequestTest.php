<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Request;

use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
use WBW\Library\Pexels\Response\CollectionsResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collections request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CollectionsRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/CollectionsRequestTest.testDeserializeResponse.json");

        $obj = new CollectionsRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(CollectionsResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(2, $res->getPage());
        $this->assertEquals(1, $res->getPerPage());
        $this->assertEquals(5, $res->getTotalResults());
        $this->assertEquals("https://api.pexels.com/v1/collections/?page=3&per_page=1", $res->getNextPage());
        $this->assertEquals("https://api.pexels.com/v1/collections/?page=1&per_page=1", $res->getPrevPage());

        $this->assertEquals("9mp14cx", $res->getCollections()[0]->getId());
        $this->assertEquals("Cool Cats", $res->getCollections()[0]->getTitle());
        $this->assertNull($res->getCollections()[0]->getDescription());
        $this->assertFalse($res->getCollections()[0]->getPrivate());
        $this->assertEquals(6, $res->getCollections()[0]->getMediaCount());
        $this->assertEquals(5, $res->getCollections()[0]->getPhotosCount());
        $this->assertEquals(1, $res->getCollections()[0]->getVideosCount());
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new CollectionsRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(CollectionsResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals([], $res->getCollections());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new CollectionsRequest();
        $obj->setPage(2);
        $obj->setPerPage(80);

        $res = $obj->serializeRequest();
        $this->assertCount(2, $res);

        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/collections", CollectionsRequest::COLLECTIONS_RESOURCE_PATH);

        $obj = new CollectionsRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
