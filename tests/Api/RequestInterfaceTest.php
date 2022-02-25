<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Api;

use WBW\Library\Pexels\Api\RequestInterface;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Request interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\API
 */
class RequestInterfaceTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals(15, RequestInterface::PER_PAGE_DEFAULT);
        $this->assertEquals(80, RequestInterface::PER_PAGE_MAX);
    }
}
