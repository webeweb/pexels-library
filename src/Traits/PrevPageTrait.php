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
 * Prev page trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait PrevPageTrait {

    /**
     * Prev page.
     *
     * @var string
     */
    private $prevPage;

    /**
     * Get the prev page.
     *
     * @return string Returns the prev page.
     */
    public function getPrevPage() {
        return $this->prevPage;
    }

    /**
     * Set the prev page.
     *
     * @param string $prevPage The prev page.
     */
    public function setPrevPage($prevPage) {
        $this->prevPage = $prevPage;
        return $this;
    }
}
