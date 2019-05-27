<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Request;

use WBW\Library\Pexels\Model\AbstractRequest;

/**
 * Get photo request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class GetPhotoRequest extends AbstractRequest {

    /**
     * Get photo resource path.
     *
     * @var string
     */
    const GET_PHOTO_RESOURCE_PATH = "/v1/photo/:id";

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return self::GET_PHOTO_RESOURCE_PATH;
    }
}
