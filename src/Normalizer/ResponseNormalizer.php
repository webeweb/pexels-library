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

use WBW\Library\Core\Argument\ArrayHelper;
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Model\Source;

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
        $model->setHeight(intval(ArrayHelper::get($response, "height", -1)));
        $model->setPhotographer(ArrayHelper::get($response, "photographer", null));
        $model->setSrc(static::denormalizeSource(ArrayHelper::get($response, "scr", [])));
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

        if (false === $decodedResponse) {
            return $model;
        }

        $model->setNextPage(ArrayHelper::get($decodedResponse, "next_page", null));
        $model->setPage(intval(ArrayHelper::get($decodedResponse, "page", -1)));
        $model->setPerPage(intval(ArrayHelper::get($decodedResponse, "per_page", -1)));
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
}
