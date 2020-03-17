<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Attribute;

/**
 * Integer per page trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Attribute
 */
trait IntegerPerPageTrait {

    /**
     * Per page.
     *
     * @var int
     */
    private $perPage;

    /**
     * Get the per page.
     *
     * @return int Returns the per page.
     */
    public function getPerPage() {
        return $this->perPage;
    }

    /**
     * Set the per page.
     *
     * @param int $perPage The per page.
     */
    public function setPerPage($perPage) {
        $this->perPage = $perPage;
        return $this;
    }
}
