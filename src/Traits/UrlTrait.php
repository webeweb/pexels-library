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
 * URL trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait UrlTrait {

    /**
     * URL.
     *
     * @var string
     */
    private $url;

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set the URL.
     *
     * @param string $url The URL.
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }
}
