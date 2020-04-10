<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Exception;

use Exception;
use WBW\Library\Pexels\Exception\APIException;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * API exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Exception
 */
class APIExceptionTest extends AbstractTestCase {

    /**
     * Tests the construct() method.
     *
     * @return void
     */
    public function test__construct() {

        // Set an Exception mock.
        $throwable = new Exception;

        $obj = new APIException("message", $throwable);

        $this->assertEquals("message", $obj->getMessage());
        $this->assertSame($throwable, $obj->getPrevious());
    }
}
