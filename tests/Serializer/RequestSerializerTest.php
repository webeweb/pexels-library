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
use WBW\Library\Pexels\Request\CollectionRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
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
     * Tests the serializeCollectionRequest() method.
     *
     * @return void
     */
    public function testSerializeCollectionRequest(): void {

        // Set a Curated photos request mock.
        $request = new CollectionRequest();
        $request->setType("photos");
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializeCollectionRequest($request);
        $this->assertCount(3, $res);

        $this->assertEquals("photos", $res["type"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests the serializeCollectionsRequest() method.
     *
     * @return void
     */
    public function testSerializeCollectionsRequest(): void {

        // Set a Curated photos request mock.
        $request = new CollectionsRequest();
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializeCollectionsRequest($request);
        $this->assertCount(2, $res);

        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests the serializeCuratedPhotosRequest() method.
     *
     * @return void
     */
    public function testSerializeCuratedPhotosRequest(): void {

        // Set a Curated photos request mock.
        $request = new CuratedPhotosRequest();
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializeCuratedPhotosRequest($request);
        $this->assertCount(2, $res);

        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests the serializePopularVideosRequest() method.
     *
     * @return void
     */
    public function testSerializePopularVideosRequest(): void {

        // Set a Popular videos request mock.
        $request = new PopularVideosRequest();
        $request->setMinWidth(1280);
        $request->setMinHeight(1024);
        $request->setMinDuration(1);
        $request->setMaxDuration(60);
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializePopularVideosRequest($request);
        $this->assertCount(6, $res);

        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1024, $res["min_height"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests the serializeSearchPhotosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchPhotosRequest(): void {

        // Set a Search photos request mock.
        $request = new SearchPhotosRequest();
        $request->setQuery("github");
        $request->setOrientation("landscape");
        $request->setSize("large");
        $request->setLocale("en-US");
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializeSearchPhotosRequest($request);
        $this->assertCount(6, $res);

        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("landscape", $res["orientation"]);
        $this->assertEquals("large", $res["size"]);
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
        $request = new SearchPhotosRequest();

        try {

            RequestSerializer::serializeSearchPhotosRequest($request);
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
        $request = new SearchVideosRequest();
        $request->setQuery("github");
        $request->setOrientation("landscape");
        $request->setSize("large");
        $request->setLocale("en-US");
        $request->setPage(2);
        $request->setPerPage(80);

        $res = RequestSerializer::serializeSearchVideosRequest($request);
        $this->assertCount(6, $res);

        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("landscape", $res["orientation"]);
        $this->assertEquals("large", $res["size"]);
        $this->assertEquals("en-US", $res["locale"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests the serializeSearchVideosRequest() method.
     *
     * @return void
     */
    public function testSerializeSearchVideosRequestWithInvalidArgumentException(): void {

        // Set a Search videos request mock.
        $request = new SearchVideosRequest();

        try {

            RequestSerializer::serializeSearchVideosRequest($request);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }
}
