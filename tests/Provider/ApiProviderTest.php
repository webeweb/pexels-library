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
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use WBW\Library\Core\Exception\ApiException;
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
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Provider\TestApiProvider;

/**
 * API provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Provider
 */
class ApiProviderTest extends AbstractTestCase {

    /**
     * Authorization.
     *
     * @var string
     */
    private $authorization;

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an authorization mock.
        $this->authorization = "YOUR_API_KEY";
    }

    /**
     * Tests the beforeReturnResponse() method.
     *
     * @return void
     */
    public function testBeforeReturnResponse(): void {

        // Set a Photos response mock.
        $photosResponse = new PhotosResponse();

        $obj = new TestApiProvider();

        $obj->beforeReturnResponse($photosResponse);
        $this->assertSame($obj->getLimit(), $photosResponse->getLimit());
        $this->assertSame($obj->getRemaining(), $photosResponse->getRemaining());
        $this->assertSame($obj->getReset(), $photosResponse->getReset());
    }

    /**
     * Tests the curatedPhotos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testCuratedPhotos(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Curated photos request mock.
        $curatedPhotosRequest = new CuratedPhotosRequest();

        $obj = new ApiProvider($this->authorization, $logger);

        try {

            $res = $obj->curatedPhotos($curatedPhotosRequest);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the curatedPhotos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testCuratedPhotosWithInvalidArgumentException(): void {

        // Set a Curated photos request mock.
        $curatedPhotosRequest = new CuratedPhotosRequest();

        $obj = new ApiProvider();

        try {

            $obj->curatedPhotos($curatedPhotosRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "authorization" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests the getPhoto() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetPhoto(): void {

        // Set a Get photos request mock.
        $getPhotoRequest = new GetPhotoRequest();
        $getPhotoRequest->setId(-1);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->getPhoto($getPhotoRequest);

            $this->assertInstanceOf(PhotoResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the getPhoto() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetPhotoWithInvalidArgumentException(): void {

        // Set a Get photos request mock.
        $getPhotoRequest = new GetPhotoRequest();
        // $getPhotoRequest->setId(1181292);

        $obj = new ApiProvider($this->authorization);

        try {

            $obj->getPhoto($getPhotoRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The substitute value :id is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the getVideo() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetVideo(): void {

        // Set a Get video request mock.
        $getVideoRequest = new GetVideoRequest();
        $getVideoRequest->setId(-1);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->getVideo($getVideoRequest);

            $this->assertInstanceOf(VideoResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the nextPage() method.
     *
     * @return void.
     */
    public function testNextPageWithPhotosResponse(): void {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();
        $searchPhotosRequest->setQuery("landscape");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->nextPage($obj->searchPhotos($searchPhotosRequest));

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the nextPage() method.
     *
     * @return void.
     */
    public function testNextPageWithVideosResponse(): void {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("landscape");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->nextPage($obj->searchVideos($searchVideosRequest));

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the popularVideos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testPopularVideos(): void {

        // Set a Popular videos request mock.
        $popularVideosRequest = new PopularVideosRequest();

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->popularVideos($popularVideosRequest);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the prevPage() method.
     *
     * @return void.
     */
    public function testPrevPageWithPhotosResponse(): void {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();
        $searchPhotosRequest->setQuery("landscape");
        $searchPhotosRequest->setPage(2);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->prevPage($obj->searchPhotos($searchPhotosRequest));

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the prevPage() method.
     *
     * @return void.
     */
    public function testPrevPageWithVideosResponse(): void {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("landscape");
        $searchVideosRequest->setPage(2);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->prevPage($obj->searchVideos($searchVideosRequest));

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the searchPhotos() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSearchPhotos(): void {

        // Set a Search photos request mock.
        $searchPhotoRequest = new SearchPhotosRequest();
        $searchPhotoRequest->setQuery("github");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->searchPhotos($searchPhotoRequest);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests the searchVideos() method.
     *
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSearchVideos(): void {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("github");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->searchVideos($searchVideosRequest);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }
}
