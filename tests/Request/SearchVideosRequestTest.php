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

        $obj = new SearchVideosRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(VideosResponse::class, $res);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new SearchVideosRequest();
        $obj->setQuery("github");

        $res = $obj->serializeRequest();
        $this->assertIsArray($res);

        $this->assertEquals("github", $res["query"]);
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
