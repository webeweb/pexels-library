<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\API;

/**
 * Paginate response interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\API
 */
interface PaginateResponseInterface {

    /**
     * Get the next page.
     *
     * @return string Returns the next page.
     */
    public function getNextPage(): string;

    /**
     * Get the prev page.
     *
     * @return string Returns the prev page.
     */
    public function getPrevPage(): string;
}
