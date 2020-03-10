<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Serializer;

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
 * Response deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Serializer
 */
class ResponseDeserializer {

    /**
     * Deserialize a photo.
     *
     * @param array $response The response.
     * @return Photo Returns a photo.
     */
    protected static function deserializePhoto(array $response) {

        $model = new Photo();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setPhotographer(ArrayHelper::get($response, "photographer", null));
        $model->setPhotographerUrl(ArrayHelper::get($response, "photographer_url", null));
        $model->setSrc(static::deserializeSource(ArrayHelper::get($response, "src", [])));
        $model->setUrl(ArrayHelper::get($response, "url", null));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));

        return $model;
    }

    /**
     * Deserialize a photo response.
     *
     * @param string $rawResponse The raw response.
     * @return PhotoResponse Returns the photo response.
     */
    public static function deserializePhotoResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new PhotoResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setPhoto(static::deserializePhoto($decodedResponse));

        return $model;
    }

    /**
     * Deserialize a photos response.
     *
     * @param string $rawResponse The raw response.
     * @return PhotosResponse Returns the photos response.
     */
    public static function deserializePhotosResponse($rawResponse) {

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
            $model->addPhoto(static::deserializePhoto($current));
        }

        return $model;
    }

    /**
     * Deserialize a source.
     *
     * @param array $response The response.
     * @return Source Returns a source.
     */
    protected static function deserializeSource(array $response) {

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
     * Deserialize a video.
     *
     * @param array $response The response.
     * @return Video Returns a video.
     */
    protected static function deserializeVideo(array $response) {

        $model = new Video();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setDuration(intval(ArrayHelper::get($response, "duration", -1)));
        $model->setFullRes(ArrayHelper::get($response, "full_res", null));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setImage(ArrayHelper::get($response, "image", null));
        $model->setUrl(ArrayHelper::get($response, "url", null));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));

        foreach (ArrayHelper::get($response, "video_files", []) as $current) {
            $model->addVideoFile(static::deserializeVideoFile($current));
        }

        foreach (ArrayHelper::get($response, "video_pictures", []) as $current) {
            $model->addVideoPicture(static::deserializeVideoPicture($current));
        }

        return $model;
    }

    /**
     * Deserialize a video file.
     *
     * @param array $response The response.
     * @return VideoFile Returns a video file.
     */
    protected static function deserializeVideoFile(array $response) {

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
     * Deserialize a video picture.
     *
     * @param array $response The response.
     * @return VideoPicture Returns a video picture.
     */
    protected static function deserializeVideoPicture(array $response) {

        $model = new VideoPicture();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setNr(intval(ArrayHelper::get($response, "nr", -1)));
        $model->setPicture(ArrayHelper::get($response, "picture", null));

        return $model;
    }

    /**
     * Deserialize a video response.
     *
     * @param string $rawResponse The raw response.
     * @return VideoResponse Returns the video response.
     */
    public static function deserializeVideoResponse($rawResponse) {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new VideoResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setVideo(static::deserializeVideo($decodedResponse));

        return $model;
    }

    /**
     * Deserialize a videos response.
     *
     * @param string $rawResponse The raw response.
     * @return VideosResponse Returns the photos response.
     */
    public static function deserializeVideosResponse($rawResponse) {

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
            $model->addVideo(static::deserializeVideo($current));
        }

        return $model;
    }
}
