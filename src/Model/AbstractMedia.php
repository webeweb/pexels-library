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

use WBW\Library\Pexels\Traits\HeightTrait;
use WBW\Library\Pexels\Traits\IdTrait;
use WBW\Library\Pexels\Traits\UrlTrait;
use WBW\Library\Pexels\Traits\WidthTrait;

/**
 * Abstract media.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractMedia {

    use HeightTrait;
    use IdTrait;
    use UrlTrait;
    use WidthTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }
}
