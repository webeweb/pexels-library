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

use InvalidArgumentException;
use WBW\Library\Core\Argument\Helper\ArrayHelper;
use WBW\Library\Pexels\Model\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Model\Request\PopularVideosRequest;
use WBW\Library\Pexels\Model\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Model\Request\SearchVideosRequest;

/**
 * Request serializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Serializer
 */
class RequestSerializer {

    /**
     * Serialize a curated photos request.
     *
     * @param CuratedPhotosRequest $request The curated photos request.
     * @return array Returns the serialized curated photos request.
     */
    public static function serializeCuratedPhotosRequest(CuratedPhotosRequest $request) {

        $result = [];

        ArrayHelper::set($result, "per_page", $request->getPerPage(), [null, CuratedPhotosRequest::PER_PAGE_DEFAULT]);
        ArrayHelper::set($result, "page", $request->getPage(), [null, 1]);

        return $result;
    }

    /**
     * Serialize a popular videos request.
     *
     * @param PopularVideosRequest $request The popular photos request.
     * @return array Returns the serialized popular videos request.
     */
    public static function serializePopularVideosRequest(PopularVideosRequest $request) {

        $result = [];

        ArrayHelper::set($result, "per_page", $request->getPerPage(), [null, PopularVideosRequest::PER_PAGE_DEFAULT]);
        ArrayHelper::set($result, "page", $request->getPage(), [null, 1]);
        ArrayHelper::set($result, "min_width", $request->getMinWidth(), [null]);
        ArrayHelper::set($result, "max_width", $request->getMaxWidth(), [null]);
        ArrayHelper::set($result, "min_duration", $request->getMinDuration(), [null]);
        ArrayHelper::set($result, "max_duration", $request->getMaxDuration(), [null]);

        return $result;
    }

    /**
     * Serialize a search photos request.
     *
     * @param SearchPhotosRequest $request The search photos request.
     * @return array Returns the serialized search photos request.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public static function serializeSearchPhotosRequest(SearchPhotosRequest $request) {

        $result = [];

        if (null === $request->getQuery()) {
            throw new InvalidArgumentException('The mandatory parameter "query" is missing');
        }

        ArrayHelper::set($result, "query", $request->getQuery());
        ArrayHelper::set($result, "per_page", $request->getPerPage(), [null, SearchPhotosRequest::PER_PAGE_DEFAULT]);
        ArrayHelper::set($result, "page", $request->getPage(), [null, 1]);

        return $result;
    }

    /**
     * Serialize a search videos request.
     *
     * @param SearchVideosRequest $request The search photos request.
     * @return array Returns the serialized search videos request.
     * @throws InvalidArgumentException Throws an invalid argument exception if a mandatory parameter is missing.
     */
    public static function serializeSearchVideosRequest(SearchVideosRequest $request) {

        $result = [];

        if (null === $request->getQuery()) {
            throw new InvalidArgumentException('The mandatory parameter "query" is missing');
        }

        ArrayHelper::set($result, "query", $request->getQuery());
        ArrayHelper::set($result, "per_page", $request->getPerPage(), [null, SearchVideosRequest::PER_PAGE_DEFAULT]);
        ArrayHelper::set($result, "page", $request->getPage(), [null, 1]);
        ArrayHelper::set($result, "min_width", $request->getMinWidth(), [null]);
        ArrayHelper::set($result, "max_width", $request->getMaxWidth(), [null]);
        ArrayHelper::set($result, "min_duration", $request->getMinDuration(), [null]);
        ArrayHelper::set($result, "max_duration", $request->getMaxDuration(), [null]);

        return $result;
    }
}
