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
 * Next page trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait NextPageTrait {

    /**
     * Next page.
     *
     * @var string
     */
    private $nextPage;

    /**
     * Get the next page.
     *
     * @return string Returns the next page.
     */
    public function getNextPage() {
        return $this->nextPage;
    }

    /**
     * Set the next page.
     *
     * @param string $nextPage The next page.
     */
    public function setNextPage($nextPage) {
        $this->nextPage = $nextPage;
        return $this;
    }
}
