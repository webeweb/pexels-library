<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Model;

use WBW\Library\Pexels\Model\AbstractRequest;

/**
 * Test request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Fixtures\Model
 */
class TestRequest extends AbstractRequest {

    /**
     * {@inheritDoc}
     */
    public function getResourcePath() {
        return null;
    }
}
