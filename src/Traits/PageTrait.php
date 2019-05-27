<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Traits;

/**
 * Page trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait PageTrait {

    /**
     * Page.
     *
     * @var int
     */
    private $page;

    /**
     * Get the page.
     *
     * @return int Returns the page.
     */
    public function getPage() {
        return $this->page;
    }

    /**
     * Set the page.
     *
     * @param int $page The page.
     */
    public function setPage($page) {
        $this->page = $page;
        return $this;
    }
}
