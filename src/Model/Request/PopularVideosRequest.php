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

use WBW\Library\Core\Model\Attribute\IntegerPageTrait;
use WBW\Library\Pexels\Model\AbstractRequest;
use WBW\Library\Pexels\Model\Attribute\IntegerMaxDurationTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerMaxWidthTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerMinDurationTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerMinWidthTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerPerPageTrait;

/**
 * Popular videos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class PopularVideosRequest extends AbstractRequest {

    use IntegerMinDurationTrait;
    use IntegerMinWidthTrait;
    use IntegerMaxDurationTrait;
    use IntegerMaxWidthTrait;
    use IntegerPageTrait;
    use IntegerPerPageTrait;

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
        $this->setPerPage(self::PER_PAGE_DEFAULT);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::POPULAR_VIDEOS_RESOURCE_PATH;
    }
}
