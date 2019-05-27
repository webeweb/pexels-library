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
 * Curated photos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class CuratedPhotosRequest extends AbstractRequest {

    /**
     * Curated photo resource path.
     *
     * @var string
     */
    const CURATED_PHOTO_RESOURCE_PATH = "/v1/curated";

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return self::CURATED_PHOTO_RESOURCE_PATH;
    }
}
