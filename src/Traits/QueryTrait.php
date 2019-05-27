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
 * Query trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait QueryTrait {

    /**
     * Query.
     *
     * @var string
     */
    private $query;

    /**
     * Get the query.
     *
     * @return string Returns the query.
     */
    public function getQuery() {
        return $this->query;
    }

    /**
     * Set the query.
     *
     * @param string $query The query.
     */
    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }
}
