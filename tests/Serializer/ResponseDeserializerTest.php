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

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Response\CollectionResponse;
use WBW\Library\Pexels\Response\CollectionsResponse;
use WBW\Library\Pexels\Response\PhotoResponse;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Response\VideosResponse;
use WBW\Library\Pexels\Serializer\ResponseDeserializer;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Response deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Tests the deserializeCollectionResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionResponse.json");

        $res = ResponseDeserializer::deserializeCollectionResponse($json);
        $this->assertInstanceOf(CollectionResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertEquals(2, $res->getPage());
        $this->assertEquals(2, $res->getPerPage());
        $this->assertEquals(6, $res->getTotalResults());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=3&per_page=2", $res->getNextPage());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=1&per_page=2", $res->getPrevPage());

        $this->assertInstanceOf(Photo::class, $res->getMedias()[0]);
        $this->assertInstanceOf(Video::class, $res->getMedias()[1]);
    }

    /**
     * Tests the deserializeCollectionResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionResponseWithBadRawResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializeCollectionResponse($json);
        $this->assertInstanceOf(CollectionResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertEquals([], $res->getMedias());
    }

    /**
     * Tests the deserializeCollectionsResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionsResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionsResponse.json");

        $res = ResponseDeserializer::deserializeCollectionsResponse($json);
        $this->assertInstanceOf(CollectionsResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
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
     * Tests the deserializeCollectionsResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionsResponseWithBadRawResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializeCollectionsResponse($json);
        $this->assertInstanceOf(CollectionsResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertEquals([], $res->getCollections());
    }

    /**
     * Tests the deserializePhotoResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotoResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");
        $data = json_decode($json, true);
        $tmp  = json_encode($data["photos"][0]);

        $res = ResponseDeserializer::deserializePhotoResponse($tmp);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($tmp, $res->getRawResponse());
        $this->assertEquals(1181292, $res->getPhoto()->getId());
        $this->assertEquals(3756, $res->getPhoto()->getWidth());
        $this->assertEquals(5627, $res->getPhoto()->getHeight());
        $this->assertEquals("https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/", $res->getPhoto()->getUrl());
        $this->assertEquals("Christina Morillo", $res->getPhoto()->getPhotographer());
        $this->assertEquals("https://www.pexels.com/@divinetechygirl", $res->getPhoto()->getPhotographerUrl());
        $this->assertNotNull($res->getPhoto()->getSrc());
    }

    /**
     * Tests the deserializePhotoResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotoResponseWithBadRawResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializePhotoResponse($json);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertNull($res->getPhoto());
    }

    /**
     * Tests the deserializePhotosResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotosResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");

        $res = ResponseDeserializer::deserializePhotosResponse($json);
        $this->assertInstanceOf(PhotosResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertEquals(6, $res->getTotalResults());
        $this->assertEquals(1, $res->getPage());
        $this->assertEquals(15, $res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(1, $res->getPhotos());
    }

    /**
     * Tests the deserializePhotosResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotosResponseWithBadRawResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializePhotosResponse($json);
        $this->assertInstanceOf(PhotosResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertNull($res->getTotalResults());
        $this->assertNull($res->getPage());
        $this->assertNull($res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(0, $res->getPhotos());
    }

    /**
     * Tests the deserializeVideoResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideoResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");
        $data = json_decode($json, true);
        $tmp  = json_encode($data["videos"][0]);

        $res = ResponseDeserializer::deserializeVideoResponse($tmp);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($tmp, $res->getRawResponse());
        $this->assertEquals(1972034, $res->getVideo()->getId());
        $this->assertEquals(1920, $res->getVideo()->getWidth());
        $this->assertEquals(1080, $res->getVideo()->getHeight());
        $this->assertEquals("https://videos.pexels.com/videos/following-a-woman-in-slow-motion-1972034", $res->getVideo()->getUrl());
        $this->assertEquals("https://images.pexels.com/videos/1972034/free-video-1972034.jpg?fit=crop&w=1200&h=630&auto=compress&cs=tinysrgb", $res->getVideo()->getImage());
        $this->assertNull($res->getVideo()->getFullRes());
        $this->assertEquals(129, $res->getVideo()->getDuration());
        $this->assertCount(3, $res->getVideo()->getVideoFiles());
        $this->assertCount(15, $res->getVideo()->getVideoPictures());
    }

    /**
     * Tests the deserializeVideoResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideoResponseWithBadRewResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializeVideoResponse($json);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertNull($res->getVideo());
    }

    /**
     * Tests the deserializeVideosResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideosResponse(): void {

        // Set a JSON mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");

        $res = ResponseDeserializer::deserializeVideosResponse($json);
        $this->assertInstanceOf(VideosResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertEquals(7206, $res->getTotalResults());
        $this->assertEquals(1, $res->getPage());
        $this->assertEquals(15, $res->getPerPage());
        $this->assertEquals("http://api-videos.pexels.com/popular-videos", $res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(1, $res->getVideos());
    }

    /**
     * Tests the deserializeVideosResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideosResponseWithBadRawResponse(): void {

        // Set a JSON mock.
        $json = "";

        $res = ResponseDeserializer::deserializeVideosResponse($json);
        $this->assertInstanceOf(VideosResponse::class, $res);

        $this->assertEquals($json, $res->getRawResponse());
        $this->assertNull($res->getTotalResults());
        $this->assertNull($res->getPage());
        $this->assertNull($res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(0, $res->getVideos());
    }
}
