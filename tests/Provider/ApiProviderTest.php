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

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\CollectionRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
use WBW\Library\Pexels\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Request\GetPhotoRequest;
use WBW\Library\Pexels\Request\GetVideoRequest;
use WBW\Library\Pexels\Request\PopularVideosRequest;
use WBW\Library\Pexels\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Request\SearchVideosRequest;
use WBW\Library\Pexels\Response\CollectionResponse;
use WBW\Library\Pexels\Response\CollectionsResponse;
use WBW\Library\Pexels\Response\PhotoResponse;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Response\VideosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Provider\TestApiProvider;
use WBW\Library\Provider\Exception\ApiException;

/**
 * API provider test.
 *
 * @author webeweb <https://github.com/webeweb>
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
        $this->authorization = static::getToken();
    }

    /**
     * Tests beforeReturnResponse()
     *
     * @return void
     */
    public function testBeforeReturnResponse(): void {

        // Set a Photos response mock.
        $response = new PhotosResponse();

        $obj = new TestApiProvider();

        $obj->beforeReturnResponse($response);
        $this->assertSame($obj->getLimit(), $response->getLimit());
        $this->assertSame($obj->getRemaining(), $response->getRemaining());
        $this->assertSame($obj->getReset(), $response->getReset());
    }

    /**
     * Tests collection()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testCollection(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an Collections request mock.
        $request = new CollectionRequest();
        $request->setId("8xntbhr");

        $obj = new ApiProvider($this->authorization, $logger);

        try {

            $res = $obj->collection($request);

            $this->assertInstanceOf(CollectionResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests collections()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testCollections(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set an Collections request mock.
        $request = new CollectionsRequest();

        $obj = new ApiProvider($this->authorization, $logger);

        try {

            $res = $obj->collections($request);

            $this->assertInstanceOf(CollectionsResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests curatedPhotos()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testCuratedPhotos(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        // Set a Curated photos request mock.
        $request = new CuratedPhotosRequest();

        $obj = new ApiProvider($this->authorization, $logger);

        try {

            $res = $obj->curatedPhotos($request);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests curatedPhotos()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testCuratedPhotosWithInvalidArgumentException(): void {

        // Set a Curated photos request mock.
        $request = new CuratedPhotosRequest();

        $obj = new ApiProvider();

        try {

            $obj->curatedPhotos($request);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The mandatory parameter "authorization" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests getPhoto()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetPhoto(): void {

        // Set a Get photos request mock.
        $request = new GetPhotoRequest();
        $request->setId(2014422);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->getPhoto($request);

            $this->assertInstanceOf(PhotoResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests getPhoto()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetPhotoWithInvalidArgumentException(): void {

        // Set a Get photos request mock.
        $request = new GetPhotoRequest();
        // $request->setId(1181292);

        $obj = new ApiProvider($this->authorization);

        try {

            $obj->getPhoto($request);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The substituable value ":id" is missing', $ex->getMessage());
        }
    }

    /**
     * Tests getVideo()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetVideo(): void {

        // Set a Get video request mock.
        $request = new GetVideoRequest();
        $request->setId(-1);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->getVideo($request);

            $this->assertInstanceOf(VideoResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests nextPage()
     *
     * @return void.
     */
    public function testNextPageWithPhotosResponse(): void {

        // Set a Search photos request mock.
        $request = new SearchPhotosRequest();
        $request->setQuery("landscape");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->nextPage($obj->searchPhotos($request));

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests nextPage()
     *
     * @return void.
     */
    public function testNextPageWithVideosResponse(): void {

        // Set a Search videos request mock.
        $request = new SearchVideosRequest();
        $request->setQuery("landscape");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->nextPage($obj->searchVideos($request));

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests popularVideos()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testPopularVideos(): void {

        // Set a Popular videos request mock.
        $request = new PopularVideosRequest();

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->popularVideos($request);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests prevPage()
     *
     * @return void.
     */
    public function testPrevPageWithPhotosResponse(): void {

        // Set a Search photos request mock.
        $request = new SearchPhotosRequest();
        $request->setQuery("landscape");
        $request->setPage(2);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->prevPage($obj->searchPhotos($request));

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests prevPage()
     *
     * @return void.
     */
    public function testPrevPageWithVideosResponse(): void {

        // Set a Search videos request mock.
        $request = new SearchVideosRequest();
        $request->setQuery("landscape");
        $request->setPage(2);

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->prevPage($obj->searchVideos($request));

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests searchPhotos()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSearchPhotos(): void {

        // Set a Search photos request mock.
        $request = new SearchPhotosRequest();
        $request->setQuery("github");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->searchPhotos($request);

            $this->assertInstanceOf(PhotosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }

    /**
     * Tests searchVideos()
     *
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testSearchVideos(): void {

        // Set a Search videos request mock.
        $request = new SearchVideosRequest();
        $request->setQuery("github");

        $obj = new ApiProvider($this->authorization);

        try {

            $res = $obj->searchVideos($request);

            $this->assertInstanceOf(VideosResponse::class, $res);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ApiException::class, $ex);
            $this->assertEquals(403, $ex->getPrevious()->getCode());
        }
    }
}
