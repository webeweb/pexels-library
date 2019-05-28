<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Normalizer;

use WBW\Library\Pexels\Normalizer\ResponseNormalizer;

/**
 * Test response normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Fixtures\Normalizer
 */
class TestResponseNormalizer extends ResponseNormalizer {

    /**
     * {@inheritDoc}
     */
    public static function denormalizePhoto(array $response) {
        return parent::denormalizePhoto($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function denormalizeSource(array $response) {
        return parent::denormalizeSource($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function denormalizeVideo(array $response) {
        return parent::denormalizeVideo($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function denormalizeVideoFile(array $response) {
        return parent::denormalizeVideoFile($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function denormalizeVideoPicture(array $response) {
        return parent::denormalizeVideoPicture($response);
    }
}
