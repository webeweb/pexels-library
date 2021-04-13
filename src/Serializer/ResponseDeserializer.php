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
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Response\PhotoResponse;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Response\VideosResponse;

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
    protected static function deserializePhoto(array $response): Photo {

        $model = new Photo();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setUrl(ArrayHelper::get($response, "url"));
        $model->setPhotographer(ArrayHelper::get($response, "photographer"));
        $model->setPhotographerUrl(ArrayHelper::get($response, "photographer_url"));
        $model->setPhotographerId(ArrayHelper::get($response, "photographer_id"));
        $model->setSrc(static::deserializeSource(ArrayHelper::get($response, "src", [])));

        return $model;
    }

    /**
     * Deserialize a photo response.
     *
     * @param string $rawResponse The raw response.
     * @return PhotoResponse Returns the photo response.
     */
    public static function deserializePhotoResponse(string $rawResponse): PhotoResponse {

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
    public static function deserializePhotosResponse(string $rawResponse): PhotosResponse {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new PhotosResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setTotalResults(intval(ArrayHelper::get($decodedResponse, "total_results", -1)));
        $model->setPage(intval(ArrayHelper::get($decodedResponse, "page", -1)));
        $model->setPerPage(intval(ArrayHelper::get($decodedResponse, "per_page", -1)));
        $model->setUrl(ArrayHelper::get($decodedResponse, "url"));
        $model->setPrevPage(ArrayHelper::get($decodedResponse, "prev_page"));
        $model->setNextPage(ArrayHelper::get($decodedResponse, "next_page"));

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
    protected static function deserializeSource(array $response): Source {

        $model = new Source();
        $model->setOriginal(ArrayHelper::get($response, "original"));
        $model->setLarge(ArrayHelper::get($response, "large"));
        $model->setLarge2x(ArrayHelper::get($response, "large2x"));
        $model->setMedium(ArrayHelper::get($response, "medium"));
        $model->setSmall(ArrayHelper::get($response, "small"));
        $model->setPortrait(ArrayHelper::get($response, "portrait"));
        $model->setLandscape(ArrayHelper::get($response, "landscape"));
        $model->setTiny(ArrayHelper::get($response, "tiny"));

        return $model;
    }

    /**
     * Deserialize an user.
     *
     * @param array $response The response.
     * @return User Returns an user.
     */
    protected static function deserializeUser(array $response): User {

        $model = new User();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setName(ArrayHelper::get($response, "name"));
        $model->setUrl(ArrayHelper::get($response, "url"));

        return $model;
    }

    /**
     * Deserialize a video.
     *
     * @param array $response The response.
     * @return Video Returns a video.
     */
    protected static function deserializeVideo(array $response): Video {

        $model = new Video();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setUrl(ArrayHelper::get($response, "url"));
        $model->setImage(ArrayHelper::get($response, "image"));
        $model->setFullRes(ArrayHelper::get($response, "full_res"));
        $model->setDuration(intval(ArrayHelper::get($response, "duration", -1)));
        $model->setUser(static::deserializeUser(ArrayHelper::get($response, "user", [])));

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
    protected static function deserializeVideoFile(array $response): VideoFile {

        $model = new VideoFile();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setQuality(ArrayHelper::get($response, "quality"));
        $model->setFileType(ArrayHelper::get($response, "file_type"));
        $model->setWidth(intval(ArrayHelper::get($response, "width", -1)));
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setLink(ArrayHelper::get($response, "link"));

        return $model;
    }

    /**
     * Deserialize a video picture.
     *
     * @param array $response The response.
     * @return VideoPicture Returns a video picture.
     */
    protected static function deserializeVideoPicture(array $response): VideoPicture {

        $model = new VideoPicture();
        $model->setId(intval(ArrayHelper::get($response, "id", -1)));
        $model->setPicture(ArrayHelper::get($response, "picture"));
        $model->setNr(intval(ArrayHelper::get($response, "nr", -1)));

        return $model;
    }

    /**
     * Deserialize a video response.
     *
     * @param string $rawResponse The raw response.
     * @return VideoResponse Returns the video response.
     */
    public static function deserializeVideoResponse(string $rawResponse): VideoResponse {

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
    public static function deserializeVideosResponse(string $rawResponse): VideosResponse {

        $decodedResponse = json_decode(trim($rawResponse), true);

        $model = new VideosResponse();
        $model->setRawResponse($rawResponse);

        if (null === $decodedResponse) {
            return $model;
        }

        $model->setTotalResults(intval(ArrayHelper::get($decodedResponse, "total_results", -1)));
        $model->setPage(intval(ArrayHelper::get($decodedResponse, "page", -1)));
        $model->setPerPage(intval(ArrayHelper::get($decodedResponse, "per_page", -1)));
        $model->setUrl(ArrayHelper::get($decodedResponse, "url"));
        $model->setPrevPage(ArrayHelper::get($decodedResponse, "prev_page"));
        $model->setNextPage(ArrayHelper::get($decodedResponse, "next_page"));

        foreach (ArrayHelper::get($decodedResponse, "videos", []) as $current) {
            $model->addVideo(static::deserializeVideo($current));
        }

        return $model;
    }
}
