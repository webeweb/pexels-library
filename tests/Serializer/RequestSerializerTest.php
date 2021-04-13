<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Serializer;

use Exception;
use InvalidArgumentException;
use WBW\Library\Pexels\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Request\PopularVideosRequest;
use WBW\Library\Pexels\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Request\SearchVideosRequest;
use WBW\Library\Pexels\Serializer\RequestSerializer;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Request serializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Serializer
 */
class RequestSerializerTest extends AbstractTestCase {

    /**
     * Tests the serializeCuratedPhotosRequest() method.
     *
     * @return void
     */
    public function testSerializeCuratedPhotosRequest(): void {

        // Set a Curated photos request mock.
        $curatedPhotosRequest = new CuratedPhotosRequest();
        $curatedPhotosRequest->setPerPage(80);
        $curatedPhotosRequest->setPage(2);

        $res = RequestSerializer::serializeCuratedPhotosRequest($curatedPhotosRequest);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
    }

    /**
     * Tests the serializePopularVideosRequest() method.
     *
     * @return void
     */
    public function testSerializePopularVideosRequest(): void {

        // Set a Popular videos request mock.
        $popularVideosRequest = new PopularVideosRequest();
        $popularVideosRequest->setPerPage(80);
        $popularVideosRequest->setPage(2);
        $popularVideosRequest->setMinWidth(1280);
        $popularVideosRequest->setMaxWidth(1920);
        $popularVideosRequest->setMinDuration(1);
        $popularVideosRequest->setMaxDuration(60);

        $res = RequestSerializer::serializePopularVideosRequest($popularVideosRequest);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1920, $res["max_width"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
    }

    /**
     * Tests the serializeSearchPhotosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchPhotosRequest(): void {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();
        $searchPhotosRequest->setQuery("github");
        $searchPhotosRequest->setLocale("en-US");
        $searchPhotosRequest->setPerPage(80);
        $searchPhotosRequest->setPage(2);

        $res = RequestSerializer::serializeSearchPhotosRequest($searchPhotosRequest);
        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("en-US", $res["locale"]);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
    }

    /**
     * Tests the serializeSearchPhotosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchPhotosRequestWithInvalidArgumentException(): void {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();

        try {

            RequestSerializer::serializeSearchPhotosRequest($searchPhotosRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests the serializeSearchVideosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchVideosRequest(): void {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("github");
        $searchVideosRequest->setPerPage(80);
        $searchVideosRequest->setPage(2);
        $searchVideosRequest->setMinWidth(1280);
        $searchVideosRequest->setMaxWidth(1920);
        $searchVideosRequest->setMinDuration(1);
        $searchVideosRequest->setMaxDuration(60);

        $res = RequestSerializer::serializeSearchVideosRequest($searchVideosRequest);
        $this->assertEquals("github", $res["query"]);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1920, $res["max_width"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
    }

    /**
     * Tests the serializeSearchVideosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchVideosRequestWithInvalidArgumentException(): void {

        // Set a Search videos request mock.
        $searchPhotosRequest = new SearchVideosRequest();

        try {

            RequestSerializer::serializeSearchVideosRequest($searchPhotosRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }
}
