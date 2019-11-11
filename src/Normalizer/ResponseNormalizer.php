<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Normalizer;

use WBW\Library\Core\Argument\Helper\ArrayHelper;
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Model\Response\PhotosResponse;
use WBW\Library\Pexels\Model\Response\VideoResponse;
use WBW\Library\Pexels\Model\Response\VideosResponse;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;

/**
 * Response normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Normalizer
 */
class ResponseNormalizer {

    /**
     * Denormalize a photo.
     *
     * @param array $response The response.
     * @return Photo Returns a photo.
     */
    protected static function denormalizePhoto(array $response) {

        $model = new Photo();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setPhotographer(ArrayHelper::get($response, "photographer", null));
        $model->setPhotographerUrl(ArrayHelper::get($response, "photographer_url", null));
        $model->setSrc(static::denormalizeSource(ArrayHelper::get($response, "src", [])));
        $model->setUrl(ArrayHelper::get($response, "url", null));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));

        return $model;
    }

    /**
     * Denormalize a photo response.
     *
     * @param string $rawResponse The raw response.
     * @return PhotoResponse Returns the photo response.
     */
    public static function denormalizePhotoResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new PhotoResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setPhoto(static::denormalizePhoto($decodedResponse));

        return $model;
    }

    /**
     * Denormalize a photos response.
     *
     * @param string $rawResponse The raw response.
     * @return PhotosResponse Returns the photos response.
     */
    public static function denormalizePhotosResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new PhotosResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setNextPage(ArrayHelper::get($decodedResponse, "next_page", null));
        $model->setPage(intval(ArrayHelper::get($decodedResponse, "page", -1)));
        $model->setPerPage(intval(ArrayHelper::get($decodedResponse, "per_page", -1)));
        $model->setPrevPage(ArrayHelper::get($decodedResponse, "prev_page", null));
        $model->setTotalResults(intval(ArrayHelper::get($decodedResponse, "total_results", -1)));
        $model->setUrl(ArrayHelper::get($decodedResponse, "url", null));

        foreach (ArrayHelper::get($decodedResponse, "photos", []) as $current) {
            $model->addPhoto(static::denormalizePhoto($current));
        }

        return $model;
    }

    /**
     * Denormalize a source.
     *
     * @param array $response The response.
     * @return Source Returns a source.
     */
    protected static function denormalizeSource(array $response) {

        $model = new Source();
        $model->setLandscape(ArrayHelper::get($response, "landscape", null));
        $model->setLarge(ArrayHelper::get($response, "large", null));
        $model->setLarge2x(ArrayHelper::get($response, "large2x", null));
        $model->setMedium(ArrayHelper::get($response, "medium", null));
        $model->setOriginal(ArrayHelper::get($response, "original", null));
        $model->setPortrait(ArrayHelper::get($response, "portrait", null));
        $model->setSmall(ArrayHelper::get($response, "small", null));
        $model->setTiny(ArrayHelper::get($response, "tiny", null));

        return $model;
    }

    /**
     * Denormalize a video.
     *
     * @param array $response The response.
     * @return Video Returns a video.
     */
    protected static function denormalizeVideo(array $response) {

        $model = new Video();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setDuration(intval(ArrayHelper::get($response, "duration", -1)));
        $model->setFullRes(ArrayHelper::get($response, "full_res", null));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setImage(ArrayHelper::get($response, "image", null));
        $model->setUrl(ArrayHelper::get($response, "url", null));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));

        foreach (ArrayHelper::get($response, "video_files", []) as $current) {
            $model->addVideoFile(static::denormalizeVideoFile($current));
        }

        foreach (ArrayHelper::get($response, "video_pictures", []) as $current) {
            $model->addVideoPicture(static::denormalizeVideoPicture($current));
        }

        return $model;
    }

    /**
     * Denormalize a video file.
     *
     * @param array $response The response.
     * @return VideoFile Returns a video file.
     */
    protected static function denormalizeVideoFile(array $response) {

        $model = new VideoFile();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setFileType(ArrayHelper::get($response, "file_type", null));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setLink(ArrayHelper::get($response, "link", null));
        $model->setQuality(ArrayHelper::get($response, "quality", null));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));

        return $model;
    }

    /**
     * Denormalize a video picture.
     *
     * @param array $response The response.
     * @return VideoPicture Returns a video picture.
     */
    protected static function denormalizeVideoPicture(array $response) {

        $model = new VideoPicture();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setNr(intval(ArrayHelper::get($response, "nr", -1)));
        $model->setPicture(ArrayHelper::get($response, "picture", null));

        return $model;
    }

    /**
     * Denormalize a video response.
     *
     * @param string $rawResponse The raw response.
     * @return VideoResponse Returns the video response.
     */
    public static function denormalizeVideoResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new VideoResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setVideo(static::denormalizeVideo($decodedResponse));

        return $model;
    }

    /**
     * Denormalize a videos response.
     *
     * @param string $rawResponse The raw response.
     * @return VideosResponse Returns the photos response.
     */
    public static function denormalizeVideosResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new VideosResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setNextPage(ArrayHelper::get($decodedResponse, "next_page", null));
        $model->setPage(intval(ArrayHelper::get($decodedResponse, "page", -1)));
        $model->setPerPage(intval(ArrayHelper::get($decodedResponse, "per_page", -1)));
        $model->setPrevPage(ArrayHelper::get($decodedResponse, "prev_page", null));
        $model->setTotalResults(intval(ArrayHelper::get($decodedResponse, "total_results", -1)));
        $model->setUrl(ArrayHelper::get($decodedResponse, "url", null));

        foreach (ArrayHelper::get($decodedResponse, "videos", []) as $current) {
            $model->addVideo(static::denormalizeVideo($current));
        }

        return $model;
    }
}
