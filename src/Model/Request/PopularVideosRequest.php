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
 * Popular videos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class PopularVideosRequest extends AbstractRequest {

    /**
     * Popular videos resource path.
     *
     * @var string
     */
    const POPULAR_VIDEOS_RESOURCE_PATH = "/videos/popular";

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return self::POPULAR_VIDEOS_RESOURCE_PATH;
    }
}
