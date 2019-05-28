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
 * Link trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait LinkTrait {

    /**
     * Link.
     *
     * @var string
     */
    private $link;

    /**
     * Get the LINK.
     *
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * Set the LINK.
     *
     * @param string $link The LINK.
     */
    public function setLink($link) {
        $this->link = $link;
        return $this;
    }
}
