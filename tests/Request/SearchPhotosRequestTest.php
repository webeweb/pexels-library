<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Request;

use InvalidArgumentException;
use Throwable;
use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Search photos request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class SearchPhotosRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/SearchPhotosRequestTest.testDeserializeResponse.json");

        $obj = new SearchPhotosRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(PhotosResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(6, $res->getTotalResults());
        $this->assertEquals(1, $res->getPage());
        $this->assertEquals(15, $res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(1, $res->getPhotos());
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new SearchPhotosRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(PhotosResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getTotalResults());
        $this->assertNull($res->getPage());
        $this->assertNull($res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(0, $res->getPhotos());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new SearchPhotosRequest();
        $obj->setQuery("github");
        $obj->setOrientation("landscape");
        $obj->setSize("large");
        $obj->setColor("color");
        $obj->setLocale("en-US");
        $obj->setPage(2);
        $obj->setPerPage(80);

        $res = $obj->serializeRequest();
        $this->assertCount(7, $res);

        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("landscape", $res["orientation"]);
        $this->assertEquals("large", $res["size"]);
        $this->assertEquals("color", $res["color"]);
        $this->assertEquals("en-US", $res["locale"]);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequestWithInvalidArgumentException(): void {

        $obj = new SearchPhotosRequest();

        try {

            $obj->serializeRequest();
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/search", SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH);

        $obj = new SearchPhotosRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getColor());
        $this->assertNull($obj->getLocale());
        $this->assertNull($obj->getOrientation());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertNull($obj->getQuery());
        $this->assertNull($obj->getSize());
    }
}
