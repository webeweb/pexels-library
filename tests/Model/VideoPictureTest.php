<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model;

use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Video picture test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class VideoPictureTest extends AbstractTestCase {

    /**
     * Tests setNr()
     *
     * @return void
     */
    public function testSetNr(): void {

        $obj = new VideoPicture();

        $obj->setNr(1);
        $this->assertEquals(1, $obj->getNr());
    }

    /**
     * Tests setPicture()
     *
     * @return void
     */
    public function testSetPicture(): void {

        $obj = new VideoPicture();

        $obj->setPicture("picture");
        $this->assertEquals("picture", $obj->getPicture());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new VideoPicture();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getRawData());

        $this->assertNull($obj->getNr());
        $this->assertNull($obj->getPicture());
    }
}
