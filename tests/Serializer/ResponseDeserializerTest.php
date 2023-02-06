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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Tests deserializeCollectionResponse()
     *
     * @return void
     */
    public function testDeserializeCollectionResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionResponse.json");

        $res = ResponseDeserializer::deserializeCollectionResponse($rawResponse);
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
     * Tests deserializeCollectionResponse()
     *
     * @return void
     */
    public function testDeserializeCollectionResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializeCollectionResponse($rawResponse);
        $this->assertInstanceOf(CollectionResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals([], $res->getMedias());
    }

    /**
     * Tests deserializeCollectionsResponse()
     *
     * @return void
     */
    public function testDeserializeCollectionsResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionsResponse.json");

        $res = ResponseDeserializer::deserializeCollectionsResponse($rawResponse);
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
     * Tests deserializeCollectionsResponse()
     *
     * @return void
     */
    public function testDeserializeCollectionsResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializeCollectionsResponse($rawResponse);
        $this->assertInstanceOf(CollectionsResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals([], $res->getCollections());
    }

    /**
     * Tests deserializePhotoResponse()
     *
     * @return void
     */
    public function testDeserializePhotoResponse(): void {

        // Set a raw response mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");
        $data = json_decode($json, true);

        $rawResponse = json_encode($data["photos"][0]);

        $res = ResponseDeserializer::deserializePhotoResponse($rawResponse);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(1181292, $res->getPhoto()->getId());
        $this->assertEquals(3756, $res->getPhoto()->getWidth());
        $this->assertEquals(5627, $res->getPhoto()->getHeight());
        $this->assertEquals("https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/", $res->getPhoto()->getUrl());
        $this->assertEquals("Christina Morillo", $res->getPhoto()->getPhotographer());
        $this->assertEquals("https://www.pexels.com/@divinetechygirl", $res->getPhoto()->getPhotographerUrl());
        $this->assertNotNull($res->getPhoto()->getSrc());
    }

    /**
     * Tests deserializePhotoResponse()
     *
     * @return void
     */
    public function testDeserializePhotoResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializePhotoResponse($rawResponse);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getPhoto());
    }

    /**
     * Tests deserializePhotosResponse()
     *
     * @return void
     */
    public function testDeserializePhotosResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");

        $res = ResponseDeserializer::deserializePhotosResponse($rawResponse);
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
     * Tests deserializePhotosResponse()
     *
     * @return void
     */
    public function testDeserializePhotosResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializePhotosResponse($rawResponse);
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
     * Tests deserializeVideoResponse()
     *
     * @return void
     */
    public function testDeserializeVideoResponse(): void {

        // Set a raw response mock.
        $json = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");
        $data = json_decode($json, true);

        $rawResponse = json_encode($data["videos"][0]);

        $res = ResponseDeserializer::deserializeVideoResponse($rawResponse);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
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
     * Tests deserializeVideoResponse()
     *
     * @return void
     */
    public function testDeserializeVideoResponseWithBadRewResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializeVideoResponse($rawResponse);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getVideo());
    }

    /**
     * Tests deserializeVideosResponse()
     *
     * @return void
     */
    public function testDeserializeVideosResponse(): void {

        // Set a raw response mock.
        $rawResponse = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");

        $res = ResponseDeserializer::deserializeVideosResponse($rawResponse);
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
     * Tests deserializeVideosResponse()
     *
     * @return void
     */
    public function testDeserializeVideosResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $res = ResponseDeserializer::deserializeVideosResponse($rawResponse);
        $this->assertInstanceOf(VideosResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getTotalResults());
        $this->assertNull($res->getPage());
        $this->assertNull($res->getPerPage());
        $this->assertNull($res->getUrl());
        $this->assertNull($res->getNextPage());
        $this->assertCount(0, $res->getVideos());
    }

}
