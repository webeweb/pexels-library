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
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Model\Response\PhotosResponse;
use WBW\Library\Pexels\Model\Response\VideoResponse;
use WBW\Library\Pexels\Model\Response\VideosResponse;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Serializer\ResponseDeserializer;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Serializer\TestResponseDeserializer;
use WBW\Library\Pexels\Tests\Fixtures\TestFixtures;

/**
 * Response deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Serializer
 */
class ResponseDeserializerTest extends AbstractTestCase {

    /**
     * Tests the deserializePhoto() method.
     *
     * @return void
     */
    public function testDeserializePhoto() {

        $arg = json_decode(TestFixtures::SAMPLE_PHOTOS_RESPONSE, true)["photos"][0];

        $obj = TestResponseDeserializer::deserializePhoto($arg);
        $this->assertInstanceOf(Photo::class, $obj);

        $this->assertEquals(1181292, $obj->getId());
        $this->assertEquals(3756, $obj->getWidth());
        $this->assertEquals(5627, $obj->getHeight());
        $this->assertEquals("https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/", $obj->getUrl());
        $this->assertEquals("Christina Morillo", $obj->getPhotographer());
        $this->assertEquals("https://www.pexels.com/@divinetechygirl", $obj->getPhotographerUrl());
        $this->assertEquals(680589, $obj->getPhotographerId());
        $this->assertNotNull($obj->getSrc());
    }

    /**
     * Tests the deserializePhotoResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotoResponse() {

        $arg = json_decode(TestFixtures::SAMPLE_PHOTOS_RESPONSE, true)["photos"][0];

        $obj = ResponseDeserializer::deserializePhotoResponse(json_encode($arg));
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
    public function testDeserializePhotoResponseWithBadRawResponse() {

        $obj = ResponseDeserializer::deserializePhotoResponse("");
        $this->assertInstanceOf(PhotoResponse::class, $obj);

        $this->assertNull($obj->getPhoto());
    }

    /**
     * Tests the deserializePhotosResponse() method.
     *
     * @return void
     */
    public function testDeserializePhotosResponse() {

        $obj = ResponseDeserializer::deserializePhotosResponse(TestFixtures::SAMPLE_PHOTOS_RESPONSE);
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
    public function testDeserializePhotosResponseWithBadRawResponse() {

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
     * Tests the deserializeSource() method.
     *
     * @return void
     */
    public function testDeserializeSource() {

        $arg = json_decode(TestFixtures::SAMPLE_PHOTOS_RESPONSE, true)["photos"][0]["src"];

        $obj = TestResponseDeserializer::deserializeSource($arg);
        $this->assertInstanceOf(Source::class, $obj);

        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg", $obj->getOriginal());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940", $obj->getLarge2x());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=650&w=940", $obj->getLarge());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=350", $obj->getMedium());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=130", $obj->getSmall());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=1200&w=800", $obj->getPortrait());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=627&w=1200", $obj->getLandscape());
        $this->assertEquals("https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=200&w=280", $obj->getTiny());
    }

    /**
     * Tests the deserializeUser() method.
     *
     * @return void
     */
    public function testDeserializeUser() {

        $arg = json_decode(TestFixtures::SAMPLE_VIDEOS_RESPONSE, true)["videos"][0]["user"];

        $obj = TestResponseDeserializer::deserializeUser($arg);
        $this->assertInstanceOf(User::class, $obj);

        $this->assertEquals(680589, $obj->getId());
        $this->assertEquals("Joey Farina", $obj->getName());
        $this->assertEquals("https://www.pexels.com/@joey", $obj->getUrl());
    }

    /**
     * Tests the deserializeVideo() method.
     *
     * @return void
     */
    public function testDeserializeVideo() {

        $arg = json_decode(TestFixtures::SAMPLE_VIDEOS_RESPONSE, true)["videos"][0];

        $obj = TestResponseDeserializer::deserializeVideo($arg);
        $this->assertInstanceOf(Video::class, $obj);

        $this->assertEquals(1972034, $obj->getId());
        $this->assertEquals(1920, $obj->getWidth());
        $this->assertEquals(1080, $obj->getHeight());
        $this->assertEquals("https://videos.pexels.com/videos/following-a-woman-in-slow-motion-1972034", $obj->getUrl());
        $this->assertEquals("https://images.pexels.com/videos/1972034/free-video-1972034.jpg?fit=crop&w=1200&h=630&auto=compress&cs=tinysrgb", $obj->getImage());
        $this->assertNull($obj->getFullRes());
        $this->assertEquals(129, $obj->getDuration());
        $this->assertNotNull($obj->getUser());
        $this->assertCount(3, $obj->getVideoFiles());
        $this->assertCount(15, $obj->getVideoPictures());
    }

    /**
     * Tests the deserializeVideoFile() method.
     *
     * @return void
     */
    public function testDeserializeVideoFile() {

        $arg = json_decode(TestFixtures::SAMPLE_VIDEOS_RESPONSE, true)["videos"][0]["video_files"][0];

        $obj = TestResponseDeserializer::deserializeVideoFile($arg);
        $this->assertInstanceOf(VideoFile::class, $obj);

        $this->assertEquals(81787, $obj->getId());
        $this->assertEquals("hd", $obj->getQuality());
        $this->assertEquals("video/mp4", $obj->getFileType());
        $this->assertEquals(1280, $obj->getWidth());
        $this->assertEquals(720, $obj->getHeight());
        $this->assertEquals("https://player.vimeo.com/external/320621378.hd.mp4?s=3311792d05f51c075d5b7f7c0fb10fd01df68aad&profile_id=174&oauth2_token_id=57447761", $obj->getLink());
    }

    /**
     * Tests the deserializeVideoPicture() method.
     *
     * @return void
     */
    public function testDeserializeVideoPicture() {

        $arg = json_decode(TestFixtures::SAMPLE_VIDEOS_RESPONSE, true)["videos"][0]["video_pictures"][0];

        $obj = TestResponseDeserializer::deserializeVideoPicture($arg);
        $this->assertInstanceOf(VideoPicture::class, $obj);

        $this->assertEquals(199681, $obj->getId());
        $this->assertEquals("https://static-videos.pexels.com/videos/1972034/pictures/preview-0.jpg", $obj->getPicture());
        $this->assertEquals(0, $obj->getNr());
    }

    /**
     * Tests the deserializeVideoResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideoResponse() {

        $arg = json_decode(TestFixtures::SAMPLE_VIDEOS_RESPONSE, true)["videos"][0];

        $obj = ResponseDeserializer::deserializeVideoResponse(json_encode($arg));
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
    public function testDeserializeVideoResponseWithBadRewResponse() {

        $obj = ResponseDeserializer::deserializeVideoResponse("");
        $this->assertInstanceOf(VideoResponse::class, $obj);

        $this->assertNull($obj->getVideo());
    }

    /**
     * Tests the deserializeVideosResponse() method.
     *
     * @return void
     */
    public function testDeserializeVideosResponse() {

        $obj = ResponseDeserializer::deserializeVideosResponse(TestFixtures::SAMPLE_VIDEOS_RESPONSE);
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
    public function testDeserializeVideosResponseWithBadRawResponse() {

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
