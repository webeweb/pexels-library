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

/**
 * Abstract request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractRequest {

    use PageTrait;
    use PerPageTrait;

    /**
     * Authorization.
     *
     * @var string
     */
    private $authorization;

    /**
     * Query.
     *
     * @var string
     */
    private $query;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setPage(1);
        $this->setPerPage(15);
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
     * Get the query.
     *
     * @return string Returns the query.
     */
    public function getQuery() {
        return $this->query;
    }

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

    /**
     * Set the query.
     *
     * @param string $query The query.
     * @return AbstractRequest Returns this request.
     */
    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }
}
