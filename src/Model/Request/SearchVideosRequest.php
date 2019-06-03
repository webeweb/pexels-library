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
use WBW\Library\Pexels\Traits\MaxDurationTrait;
use WBW\Library\Pexels\Traits\MaxWidthTrait;
use WBW\Library\Pexels\Traits\MinDurationTrait;
use WBW\Library\Pexels\Traits\MinWidthTrait;
use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;
use WBW\Library\Pexels\Traits\QueryTrait;

/**
 * Search videos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class SearchVideosRequest extends AbstractRequest {

    use MinDurationTrait;
    use MinWidthTrait;
    use MaxDurationTrait;
    use MaxWidthTrait;
    use PageTrait;
    use PerPageTrait;
    use QueryTrait;

    /**
     * Search videos resource path.
     *
     * @var string
     */
    const SEARCH_VIDEOS_RESOURCE_PATH = "/videos/search";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setPage(1);
        $this->setPerPage(self::PER_PAGE_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return self::SEARCH_VIDEOS_RESOURCE_PATH;
    }
}
