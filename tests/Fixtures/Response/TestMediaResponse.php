<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Response;

use WBW\Library\Pexels\Model\AbstractMedia;
use WBW\Library\Pexels\Response\AbstractMediaResponse;

/**
 * Test media response.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Fixtures\Response
 */
class TestMediaResponse extends AbstractMediaResponse {

    /**
     * {@inheritdoc}
     */
    public function addMedia(AbstractMedia $media): AbstractMediaResponse {
        return parent::addMedia($media);
    }

    /**
     * {@inheritdoc}
     */
    public function getMedias(): array {
        return parent::getMedias();
    }
}
