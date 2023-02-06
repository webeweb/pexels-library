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

use InvalidArgumentException;
use Throwable;
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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Serializer
 */
class RequestSerializerTest extends AbstractTestCase {

    /**
     * Tests serializeCollectionRequest()
     *
     * @return void
     */
    public function testSerializeCollectionRequest(): void {

        // Set a Collection request mock.
        $arg = new CollectionRequest();
        $arg->setType("photos");
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializeCollectionRequest($arg);
        $this->assertCount(3, $res);

        $this->assertEquals("photos", $res["type"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializeCollectionRequest()
     *
     * @return void
     */
    public function testSerializeCollectionsRequest(): void {

        // Set a Collections request mock.
        $arg = new CollectionsRequest();
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializeCollectionsRequest($arg);
        $this->assertCount(2, $res);

        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializeCuratedPhotosRequest()
     *
     * @return void
     */
    public function testSerializeCuratedPhotosRequest(): void {

        // Set a Curated photos request mock.
        $arg = new CuratedPhotosRequest();
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializeCuratedPhotosRequest($arg);
        $this->assertCount(2, $res);

        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializePopularVideosRequest()
     *
     * @return void
     */
    public function testSerializePopularVideosRequest(): void {

        // Set a Popular videos request.
        $arg = new PopularVideosRequest();
        $arg->setMinWidth(1280);
        $arg->setMinHeight(1024);
        $arg->setMinDuration(1);
        $arg->setMaxDuration(60);
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializePopularVideosRequest($arg);
        $this->assertCount(6, $res);

        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1024, $res["min_height"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializeSearchPhotosRequest()
     *
     * @return void
     */
    public function testSerializeSearchPhotosRequest(): void {

        // Set a Search photos request.
        $arg = new SearchPhotosRequest();
        $arg->setQuery("github");
        $arg->setOrientation("landscape");
        $arg->setSize("large");
        $arg->setColor("color");
        $arg->setLocale("en-US");
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializeSearchPhotosRequest($arg);
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
     * Tests serializeSearchPhotosRequest()
     *
     * @return void
     */
    public function testSerializeSearchPhotosRequestWithInvalidArgumentException(): void {

        // Set a Search photos request.
        $arg = new SearchPhotosRequest();

        try {

            RequestSerializer::serializeSearchPhotosRequest($arg);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests serializeSearchVideosRequest()
     *
     * @return void
     */
    public function testSerializeSearchVideosRequest(): void {

        // Set a Search videos request.
        $arg = new SearchVideosRequest();
        $arg->setQuery("github");
        $arg->setOrientation("landscape");
        $arg->setSize("large");
        $arg->setLocale("en-US");
        $arg->setPage(2);
        $arg->setPerPage(80);

        $res = RequestSerializer::serializeSearchVideosRequest($arg);
        $this->assertCount(6, $res);

        $this->assertEquals("github", $res["query"]);
        $this->assertEquals("landscape", $res["orientation"]);
        $this->assertEquals("large", $res["size"]);
        $this->assertEquals("en-US", $res["locale"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests serializeSearchVideosRequest()
     *
     * @return void
     */
    public function testSerializeSearchVideosRequestWithInvalidArgumentException(): void {

        // Set a Search videos request.
        $arg = new SearchVideosRequest();

        try {

            RequestSerializer::serializeSearchVideosRequest($arg);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "query" is missing', $ex->getMessage());
        }
    }
}
