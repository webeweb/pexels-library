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
use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;

/**
 * Popular videos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class PopularVideosRequest extends AbstractRequest {

    use PageTrait;
    use PerPageTrait;

    /**
     * Popular videos resource path.
     *
     * @var string
     */
    const POPULAR_VIDEOS_RESOURCE_PATH = "/videos/popular";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setPage(1);
        $this->setPerPage(15);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return self::POPULAR_VIDEOS_RESOURCE_PATH;
    }
}
