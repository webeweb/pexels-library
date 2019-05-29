<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Provider;

use InvalidArgumentException;
use WBW\Library\Pexels\Exception\APIException;
use WBW\Library\Pexels\Model\AbstractResponse;
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
use WBW\Library\Pexels\Normalizer\RequestNormalizer;
use WBW\Library\Pexels\Normalizer\ResponseNormalizer;

/**
 * API provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Provider
 */
class APIProvider extends AbstractProvider {

    /**
     * Before return a response.
     *
     * @param AbstractResponse $response The response.
     * @return AbstractResponse Returns the response.
     */
    protected function beforeReturnResponse(AbstractResponse $response) {

        $response->setLimit($this->getLimit());
        $response->setRemaining($this->getRemaining());
        $response->setReset($this->getReset());

        return $response;
    }

    /**
     * Curated photos.
     *
     * @param CuratedPhotosRequest $curatedPhotosRequest The curated photos request.
     * @return PhotosResponse Returns the photos response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function curatedPhotos(CuratedPhotosRequest $curatedPhotosRequest) {

        $queryData = RequestNormalizer::normalizeCuratedPhotosRequest($curatedPhotosRequest);

        $rawResponse = $this->callAPI($curatedPhotosRequest, $queryData);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizePhotosResponse($rawResponse));
    }

    /**
     * Get a photo.
     *
     * @param GetPhotoRequest $getPhotoRequest The get photo request.
     * @return PhotoResponse Returns the photo response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function getPhoto(GetPhotoRequest $getPhotoRequest) {

        $rawResponse = $this->callAPI($getPhotoRequest, []);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizePhotoResponse($rawResponse));
    }

    /**
     * Get a video.
     *
     * @param GetVideoRequest $getVideoRequest The get video request.
     * @return VideoResponse Returns the video response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function getVideo(GetVideoRequest $getVideoRequest) {

        $rawResponse = $this->callAPI($getVideoRequest, []);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizeVideoResponse($rawResponse));
    }

    /**
     * Popular videos.
     *
     * @param PopularVideosRequest $popularVideosRequest The popular videos request.
     * @return VideosResponse Returns the videos response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    public function popularVideos(PopularVideosRequest $popularVideosRequest) {

        $queryData = RequestNormalizer::normalizePopularVideosRequest($popularVideosRequest);

        $rawResponse = $this->callAPI($popularVideosRequest, $queryData);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizeVideosResponse($rawResponse));
    }

    /**
     * Search photos.
     *
     * @param SearchPhotosRequest $searchPhotosRequest The search photos request.
     * @return PhotosResponse Returns the photo response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public function searchPhotos(SearchPhotosRequest $searchPhotosRequest) {

        $queryData = RequestNormalizer::normalizeSearchPhotosRequest($searchPhotosRequest);

        $rawResponse = $this->callAPI($searchPhotosRequest, $queryData);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizePhotosResponse($rawResponse));
    }

    /**
     * Search videos.
     *
     * @param SearchVideosRequest $searchVideosRequest The search videos request.
     * @return VideosResponse Returns the videos response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public function searchVideos(SearchVideosRequest $searchVideosRequest) {

        $queryData = RequestNormalizer::normalizeSearchVideosRequest($searchVideosRequest);

        $rawResponse = $this->callAPI($searchVideosRequest, $queryData);

        return $this->beforeReturnResponse(ResponseNormalizer::denormalizeVideosResponse($rawResponse));
    }
}
