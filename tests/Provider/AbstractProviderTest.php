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

use Psr\Log\LoggerInterface;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Provider\TestProvider;

/**
 * Abstract provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Provider
 */
class AbstractProviderTest extends AbstractTestCase {

    /**
     * Tests setAuthorization()
     *
     * @return void
     */
    public function testSetAuthorization(): void {

        $obj = new TestProvider();

        $obj->setAuthorization("authorization");
        $this->assertEquals("authorization", $obj->getAuthorization());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a Logger mock.
        $logger = $this->getMockBuilder(LoggerInterface::class)->getMock();

        $this->assertEquals("https://api.pexels.com", TestProvider::ENDPOINT_PATH);

        $obj = new TestProvider("authorization", $logger);

        $this->assertSame($logger, $obj->getLogger());

        $this->assertEquals("authorization", $obj->getAuthorization());
        $this->assertNull($obj->getLimit());
        $this->assertNull($obj->getRemaining());
        $this->assertNull($obj->getReset());
    }
}
