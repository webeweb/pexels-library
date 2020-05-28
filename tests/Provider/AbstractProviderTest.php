<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Provider;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Provider\TestProvider;

/**
 * Abstract provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Provider
 */
class AbstractProviderTest extends AbstractTestCase {

    /**
     * Tests the setAuthorization() method.
     *
     * @retunr void.
     */
    public function testSetAuthorization() {

        $obj = new TestProvider();

        $obj->setAuthorization("authorization");
        $this->assertEquals("authorization", $obj->getAuthorization());
    }

    /**
     * Tests the setDebug() method.
     *
     * @return void
     */
    public function testSetDebug() {

        $obj = new TestProvider();

        $obj->setDebug(true);
        $this->assertTrue($obj->getDebug());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("https://api.pexels.com", TestProvider::ENDPOINT_PATH);

        $obj = new TestProvider();

        $this->assertNull($obj->getAuthorization());
        $this->assertFalse($obj->getDebug());
        $this->assertNull($obj->getLimit());
        $this->assertNull($obj->getRemaining());
        $this->assertNull($obj->getReset());
    }
}
