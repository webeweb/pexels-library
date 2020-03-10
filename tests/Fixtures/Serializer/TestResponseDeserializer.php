<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Serializer;

use WBW\Library\Pexels\Serializer\ResponseDeserializer;

/**
 * Test response deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Fixtures\Serializer
 */
class TestResponseDeserializer extends ResponseDeserializer {

    /**
     * {@inheritDoc}
     */
    public static function deserializePhoto(array $response) {
        return parent::deserializePhoto($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeSource(array $response) {
        return parent::deserializeSource($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideo(array $response) {
        return parent::deserializeVideo($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideoFile(array $response) {
        return parent::deserializeVideoFile($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideoPicture(array $response) {
        return parent::deserializeVideoPicture($response);
    }
}
