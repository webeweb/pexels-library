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

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\CollectionRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
use WBW\Library\Pexels\Response\CollectionResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collection request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CollectionRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/CollectionRequestTest.testDeserializeResponse.json");

        $obj = new CollectionRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(CollectionResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(2, $res->getPage());
        $this->assertEquals(2, $res->getPerPage());
        $this->assertEquals(6, $res->getTotalResults());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=3&per_page=2", $res->getNextPage());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=1&per_page=2", $res->getPrevPage());

        $this->assertInstanceOf(Photo::class, $res->getMedias()[0]);
        $this->assertInstanceOf(Video::class, $res->getMedias()[1]);
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new CollectionRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(CollectionResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals([], $res->getMedias());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new CollectionRequest();
        $obj->setType("photos");
        $obj->setPage(2);
        $obj->setPerPage(80);

        $res = $obj->serializeRequest();
        $this->assertCount(3, $res);

        $this->assertEquals("photos", $res["type"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new CollectionRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH . "/", $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getType());

        $obj->setId("id");
        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH . "/id", $obj->getResourcePath());
    }
}
