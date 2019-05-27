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

/**
 * Abstract request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractRequest {

    /**
     * Authorization.
     *
     * @var string
     */
    private $authorization;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the authorization.
     *
     * @return string Returns the uathorization.
     */
    public function getAuthorization() {
        return $this->authorization;
    }

    /**
     * Get the resource path.
     *
     * @return string Returns the resource path.
     */
    abstract public function getResourcePath();

    /**
     * Set the authorization.
     *
     * @param string $authorization The authorization.
     * @return AbstractRequest Returns this request.
     */
    public function setAuthorization($authorization) {
        $this->authorization = $authorization;
        return $this;
    }
}
