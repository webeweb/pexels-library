<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model;

use WBW\Library\Core\Model\Attribute\IntegerIdTrait;
use WBW\Library\Core\Model\Attribute\StringNameTrait;
use WBW\Library\Core\Model\Attribute\StringUrlTrait;

/**
 * User.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class User {

    use IntegerIdTrait {
        setId as public;
    }
    use StringNameTrait;
    use StringUrlTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }
}
