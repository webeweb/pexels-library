<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Exception;

use Exception;
use WBW\Library\Core\Exception\AbstractException as BaseException;

/**
 * Abstract exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Exception
 * @abstract
 */
abstract class AbstractException extends BaseException {

    /**
     * Constructor.
     *
     * @param string $message The message.
     * @param Exception $previous The previous exception.
     */
    public function __construct($message, Exception $previous = null) {
        parent::__construct($message, 500, $previous);
    }
}
