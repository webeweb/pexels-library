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

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Serializer\ResponseDeserializer;

/**
 * Test response deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Fixtures\Serializer
 */
class TestResponseDeserializer extends ResponseDeserializer {

    /**
     * {@inheritDoc}
     */
    public static function deserializePhoto(array $response): Photo {
        return parent::deserializePhoto($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeSource(array $response): Source {
        return parent::deserializeSource($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeUser(array $response): User {
        return parent::deserializeUser($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideo(array $response): Video {
        return parent::deserializeVideo($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideoFile(array $response): VideoFile {
        return parent::deserializeVideoFile($response);
    }

    /**
     * {@inheritDoc}
     */
    public static function deserializeVideoPicture(array $response): VideoPicture {
        return parent::deserializeVideoPicture($response);
    }
}
