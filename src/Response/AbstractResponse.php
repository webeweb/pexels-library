<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Response;

use WBW\Library\Provider\Response\AbstractResponse as BaseResponse;
use WBW\Library\Traits\Composite\CompositeRateLimitTrait;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Response
 * @abstract
 */
abstract class AbstractResponse extends BaseResponse {

    use CompositeRateLimitTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }
}
