<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Provider;

use Exception;
use WBW\Library\Pexels\Exception\APIException;
use WBW\Library\Pexels\Model\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Model\Request\GetPhotoRequest;
use WBW\Library\Pexels\Model\Request\GetVideoRequest;
use WBW\Library\Pexels\Model\Request\PopularVideosRequest;
use WBW\Library\Pexels\Model\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Model\Request\SearchVideosRequest;
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Model\Response\PhotosResponse;
use WBW\Library\Pexels\Model\Response\VideoResponse;
use WBW\Library\Pexels\Model\Response\VideosResponse;
use WBW\Library\Pexels\Provider\APIProvider;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * API provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Provider
 */
class APIProviderTest extends AbstractTestCase {

    /**
     * Authorization.
     *
     * @var string
     */
    private $authorization;

    /**
     * {inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set an Authorization mock.
        $this->authorization = "// Your API Key //";
    }

    /**
     * Tests the curatedPhotos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testCuratedPhotos() {

        // Set a Curated photos request mock.
        $curatedPhotosRequest = new CuratedPhotosRequest();

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->curatedPhotos($curatedPhotosRequest);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the getPhoto() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetPhoto() {

        // Set a Get photos request mock.
        $getPhotoRequest = new GetPhotoRequest();
        $getPhotoRequest->setId(1181292);

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->getPhoto($getPhotoRequest);

            $this->assertInstanceOf(PhotoResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the getVideo() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetVideo() {

        // Set a Get video request mock.
        $getVideoRequest = new GetVideoRequest();
        $getVideoRequest->setId(1972034);

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->getVideo($getVideoRequest);

            $this->assertInstanceOf(VideoResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the popularVideos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testPopularVideos() {

        // Set a Popular videos request mock.
        $popularVideosRequest = new PopularVideosRequest();

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->popularVideos($popularVideosRequest);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the searchPhotos() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSearchPhotos() {

        // Set a Search photos request mock.
        $searchPhotoRequest = new SearchPhotosRequest();
        $searchPhotoRequest->setQuery("github");

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->searchPhotos($searchPhotoRequest);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the searchVideos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSearchVideos() {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("github");

        $obj = new APIProvider();
        $obj->setAuthorization($this->authorization);

        try {

            $res = $obj->searchVideos($searchVideosRequest);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(APIException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }
}
