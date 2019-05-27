<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model;

use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;
use WBW\Library\Pexels\Traits\UrlTrait;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractResponse {

    use PageTrait;
    use PerPageTrait;
    use UrlTrait;

    /**
     * Next page.
     *
     * @var string
     */
    private $nextPage;

    /**
     * Total results.
     *
     * @var int
     */
    private $totalResults;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the next page.
     *
     * @return string Returns the next page.
     */
    public function getNextPage() {
        return $this->nextPage;
    }

    /**
     * Get the total results.
     *
     * @return int Returns the total results.
     */
    public function getTotalResults() {
        return $this->totalResults;
    }

    /**
     * Set the next page.
     *
     * @param string $nextPage The next page.
     * @return AbstractResponse Returns this response.
     */
    public function setNextPage($nextPage) {
        $this->nextPage = $nextPage;
        return $this;
    }

    /**
     * Set the total results.
     *
     * @param int $totalResults The total result.
     * @return AbstractResponse Returns this response.
     */
    public function setTotalResults($totalResults) {
        $this->totalResults = $totalResults;
        return $this;
    }
}
