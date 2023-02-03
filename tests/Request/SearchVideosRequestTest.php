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
use WBW\Library\Pexels\Request\SearchVideosRequest;
use WBW\Library\Pexels\Response\VideosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Search videos request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class SearchVideosRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/SearchVideosRequestTest.testDeserializeResponse.json");

        $obj = new SearchVideosRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(VideosResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(7206, $res->getTotalResults());
        $this->assertEquals(1, $res->getPage());
        $this->assertEquals(15, $res->getPerPage());
        $this->assertEquals("http://api-videos.pexels.com/popular-videos", $res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(1, $res->getVideos());
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new SearchVideosRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(VideosResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getTotalResults());
        $this->assertNull($res->getPage());
        $this->assertNull($res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(0, $res->getVideos());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new SearchVideosRequest();
        $obj->setQuery("github");
        $obj->setOrientation("landscape");
        $obj->setSize("large");
        $obj->setLocale("en-US");
        $obj->setPage(2);
        $obj->setPerPage(80);

        $res = $obj->serializeRequest();
        $this->assertCount(6, $res);

        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("landscape", $res["orientation"]);
        $this->assertEquals("large", $res["size"]);
        $this->assertEquals("en-US", $res["locale"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequestWithInvalidArgumentException(): void {

        $obj = new SearchVideosRequest();

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

        $this->assertEquals("/videos/search", SearchVideosRequest::SEARCH_VIDEOS_RESOURCE_PATH);

        $obj = new SearchVideosRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(SearchVideosRequest::SEARCH_VIDEOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getLocale());
        $this->assertNull($obj->getOrientation());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertNull($obj->getQuery());
        $this->assertNull($obj->getSize());
    }
}
