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

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionResponse.json");

        $obj = ResponseDeserializer::deserializeCollectionResponse($arg);
        $this->assertInstanceOf(CollectionResponse::class, $obj);

        $this->assertInstanceOf(Photo::class, $obj->getMedias()[0]);
        $this->assertInstanceOf(Video::class, $obj->getMedias()[1]);

        $this->assertEquals(2, $obj->getPage());
        $this->assertEquals(2, $obj->getPerPage());
        $this->assertEquals(6, $obj->getTotalResults());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=3&per_page=2", $obj->getNextPage());
        $this->assertEquals("https://api.pexels.com/v1/collections/9mp14cx/?page=1&per_page=2", $obj->getPrevPage());
    }

    /**
     * Tests the deserializeCollectionResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionResponseWithBadRawResponse(): void {

        $obj = ResponseDeserializer::deserializeCollectionResponse("");
        $this->assertInstanceOf(CollectionResponse::class, $obj);

        $this->assertEquals([], $obj->getMedias());
    }

    /**
     * Tests the deserializeCollectionsResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionsResponse(): void {

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeCollectionsResponse.json");

        $obj = ResponseDeserializer::deserializeCollectionsResponse($arg);
        $this->assertInstanceOf(CollectionsResponse::class, $obj);

        $this->assertEquals("9mp14cx", $obj->getCollections()[0]->getId());
        $this->assertEquals("Cool Cats", $obj->getCollections()[0]->getTitle());
        $this->assertNull($obj->getCollections()[0]->getDescription());
        $this->assertFalse($obj->getCollections()[0]->getPrivate());
        $this->assertEquals(6, $obj->getCollections()[0]->getMediaCount());
        $this->assertEquals(5, $obj->getCollections()[0]->getPhotosCount());
        $this->assertEquals(1, $obj->getCollections()[0]->getVideosCount());

        $this->assertEquals(2, $obj->getPage());
        $this->assertEquals(1, $obj->getPerPage());
        $this->assertEquals(5, $obj->getTotalResults());
        $this->assertEquals("https://api.pexels.com/v1/collections/?page=3&per_page=1", $obj->getNextPage());
        $this->assertEquals("https://api.pexels.com/v1/collections/?page=1&per_page=1", $obj->getPrevPage());
    }

    /**
     * Tests the deserializeCollectionsResponse() method.
     *
     * @return void
     */
    public function testDeserializeCollectionsResponseWithBadRawResponse(): void {

        $obj = ResponseDeserializer::deserializeCollectionsResponse("");
        $this->assertInstanceOf(CollectionsResponse::class, $obj);

        $this->assertEquals([], $obj->getCollections());
    }

    /**
     * Tests the deserializePhotoResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotoResponse(): void {

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");
        $tmp = json_decode($arg, true)["photos"][0];

        $obj = ResponseDeserializer::deserializePhotoResponse(json_encode($tmp));
        $this->assertInstanceOf(PhotoResponse::class, $obj);

        $this->assertEquals(1181292, $obj->getPhoto()->getId());
        $this->assertEquals(3756, $obj->getPhoto()->getWidth());
        $this->assertEquals(5627, $obj->getPhoto()->getHeight());
        $this->assertEquals("https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/", $obj->getPhoto()->getUrl());
        $this->assertEquals("Christina Morillo", $obj->getPhoto()->getPhotographer());
        $this->assertEquals("https://www.pexels.com/@divinetechygirl", $obj->getPhoto()->getPhotographerUrl());
        $this->assertNotNull($obj->getPhoto()->getSrc());
    }

    /**
     * Tests the deserializePhotoResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotoResponseWithBadRawResponse(): void {

        $obj = ResponseDeserializer::deserializePhotoResponse("");
        $this->assertInstanceOf(PhotoResponse::class, $obj);

        $this->assertNull($obj->getPhoto());
    }

    /**
     * Tests the deserializePhotosResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotosResponse(): void {

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchPhotosResponse.json");

        $obj = ResponseDeserializer::deserializePhotosResponse($arg);
        $this->assertInstanceOf(PhotosResponse::class, $obj);

        $this->assertEquals(6, $obj->getTotalResults());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getNextPage());
        $this->assertCount(1, $obj->getPhotos());
    }

    /**
     * Tests the deserializePhotosResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotosResponseWithBadRawResponse(): void {

        $obj = ResponseDeserializer::deserializePhotosResponse("");
        $this->assertInstanceOf(PhotosResponse::class, $obj);

        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getNextPage());
        $this->assertCount(0, $obj->getPhotos());
    }

    /**
     * Tests the deserializeVideoResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideoResponse(): void {

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");
        $tmp = json_decode($arg, true)["videos"][0];

        $obj = ResponseDeserializer::deserializeVideoResponse(json_encode($tmp));
        $this->assertInstanceOf(VideoResponse::class, $obj);

        $this->assertEquals(1972034, $obj->getVideo()->getId());
        $this->assertEquals(1920, $obj->getVideo()->getWidth());
        $this->assertEquals(1080, $obj->getVideo()->getHeight());
        $this->assertEquals("https://videos.pexels.com/videos/following-a-woman-in-slow-motion-1972034", $obj->getVideo()->getUrl());
        $this->assertEquals("https://images.pexels.com/videos/1972034/free-video-1972034.jpg?fit=crop&w=1200&h=630&auto=compress&cs=tinysrgb", $obj->getVideo()->getImage());
        $this->assertNull($obj->getVideo()->getFullRes());
        $this->assertEquals(129, $obj->getVideo()->getDuration());
        $this->assertCount(3, $obj->getVideo()->getVideoFiles());
        $this->assertCount(15, $obj->getVideo()->getVideoPictures());
    }

    /**
     * Tests the deserializeVideoResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideoResponseWithBadRewResponse(): void {

        $obj = ResponseDeserializer::deserializeVideoResponse("");
        $this->assertInstanceOf(VideoResponse::class, $obj);

        $this->assertNull($obj->getVideo());
    }

    /**
     * Tests the deserializeVideosResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideosResponse(): void {

        $arg = file_get_contents(__DIR__ . "/ResponseDeserializerTest.testDeserializeSearchVideosResponse.json");

        $obj = ResponseDeserializer::deserializeVideosResponse($arg);
        $this->assertInstanceOf(VideosResponse::class, $obj);

        $this->assertEquals(7206, $obj->getTotalResults());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertEquals("http://api-videos.pexels.com/popular-videos", $obj->getUrl());
        $this->assertNull($obj->getNextPage());
        $this->assertCount(1, $obj->getVideos());
    }

    /**
     * Tests the deserializeVideosResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideosResponseWithBadRawResponse(): void {

        $obj = ResponseDeserializer::deserializeVideosResponse("");
        $this->assertInstanceOf(VideosResponse::class, $obj);

        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getNextPage());
        $this->assertCount(0, $obj->getVideos());
    }
}
