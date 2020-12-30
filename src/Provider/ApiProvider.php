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
use WBW\Library\Core\Exception\ApiException;
use WBW\Library\Pexels\API\PaginateResponseInterface;
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
use WBW\Library\Pexels\Serializer\RequestSerializer;
use WBW\Library\Pexels\Serializer\ResponseDeserializer;

/**
 * API provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Provider
 */
class ApiProvider extends AbstractProvider {

    /**
     * Before return a response.
     *
     * @param AbstractResponse $response The response.
     * @return AbstractResponse Returns the response.
     */
    protected function beforeReturnResponse(AbstractResponse $response): AbstractResponse {

        $response->setLimit($this->getLimit());
        $response->setRemaining($this->getRemaining());
        $response->setReset($this->getReset());

        return $response;
    }

    /**
     * Curated photos.
     *
     * @param CuratedPhotosRequest $request The curated photos request.
     * @return PhotosResponse Returns the photos response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function curatedPhotos(CuratedPhotosRequest $request): PhotosResponse {

        $queryData = RequestSerializer::serializeCuratedPhotosRequest($request);

        $rawResponse = $this->callApiWithRequest($request, $queryData);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializePhotosResponse($rawResponse));
    }

    /**
     * Get a photo.
     *
     * @param GetPhotoRequest $request The get photo request.
     * @return PhotoResponse Returns the photo response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function getPhoto(GetPhotoRequest $request): PhotoResponse {

        $rawResponse = $this->callApiWithRequest($request, []);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializePhotoResponse($rawResponse));
    }

    /**
     * Get a video.
     *
     * @param GetVideoRequest $request The get video request.
     * @return VideoResponse Returns the video response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function getVideo(GetVideoRequest $request): VideoResponse {

        $rawResponse = $this->callApiWithRequest($request, []);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializeVideoResponse($rawResponse));
    }

    /**
     * Next page.
     *
     * @param PaginateResponseInterface $response The response.
     * @return ImagesResponse|VideosResponse Returns the response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function nextPage(PaginateResponseInterface $response) {

        $rawResponse = $this->callApiWithResponse($response, true);

        if (true === ($response instanceof PhotosResponse)) {
            return $this->beforeReturnResponse(ResponseDeserializer::deserializePhotosResponse($rawResponse));
        }

        return $this->beforeReturnResponse(ResponseDeserializer::deserializeVideosResponse($rawResponse));
    }

    /**
     * Popular videos.
     *
     * @param PopularVideosRequest $response The popular videos request.
     * @return VideosResponse Returns the videos response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function popularVideos(PopularVideosRequest $response): VideosResponse {

        $queryData = RequestSerializer::serializePopularVideosRequest($response);

        $rawResponse = $this->callApiWithRequest($response, $queryData);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializeVideosResponse($rawResponse));
    }

    /**
     * Prev page.
     *
     * @param PaginateResponseInterface $response The response.
     * @return ImagesResponse|VideosResponse Returns the response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function prevPage(PaginateResponseInterface $response) {

        $rawResponse = $this->callApiWithResponse($response, false);

        if (true === ($response instanceof PhotosResponse)) {
            return $this->beforeReturnResponse(ResponseDeserializer::deserializePhotosResponse($rawResponse));
        }

        return $this->beforeReturnResponse(ResponseDeserializer::deserializeVideosResponse($rawResponse));
    }

    /**
     * Search photos.
     *
     * @param SearchPhotosRequest $request The search photos request.
     * @return PhotosResponse Returns the photo response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public function searchPhotos(SearchPhotosRequest $request): PhotosResponse {

        $queryData = RequestSerializer::serializeSearchPhotosRequest($request);

        $rawResponse = $this->callApiWithRequest($request, $queryData);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializePhotosResponse($rawResponse));
    }

    /**
     * Search videos.
     *
     * @param SearchVideosRequest $request The search videos request.
     * @return VideosResponse Returns the videos response.
     * @throws ApiException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public function searchVideos(SearchVideosRequest $request): VideosResponse {

        $queryData = RequestSerializer::serializeSearchVideosRequest($request);

        $rawResponse = $this->callApiWithRequest($request, $queryData);

        return $this->beforeReturnResponse(ResponseDeserializer::deserializeVideosResponse($rawResponse));
    }
}
