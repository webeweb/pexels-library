<?php

declare(strict_types = 1);

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model;

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Photo test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class PhotoTest extends AbstractTestCase {

    /**
     * Test setAlt()
     *
     * @return void
     */
    public function testSetAlt(): void {

        $obj = new Photo();

        $obj->setAlt("alt");
        $this->assertEquals("alt", $obj->getAlt());
    }

    /**
     * Test setAvgColor()
     *
     * @return void
     */
    public function testSetAvgColor(): void {

        $obj = new Photo();

        $obj->setAvgColor("avgColor");
        $this->assertEquals("avgColor", $obj->getAvgColor());
    }

    /**
     * Test setLiked()
     *
     * @return void
     */
    public function testSetLiked(): void {

        $obj = new Photo();

        $obj->setLiked(true);
        $this->assertTrue($obj->getLiked());
    }

    /**
     * Test setPhotographer()
     *
     * @return void
     */
    public function testSetPhotographer(): void {

        $obj = new Photo();

        $obj->setPhotographer("photographer");
        $this->assertEquals("photographer", $obj->getPhotographer());
    }

    /**
     * Test setPhotographerId()
     *
     * @return void
     */
    public function testSetPhotographerId(): void {

        $obj = new Photo();

        $obj->setPhotographerId(1);
        $this->assertEquals(1, $obj->getPhotographerId());
    }

    /**
     * Test setPhotographerUrl()
     *
     * @return void
     */
    public function testSetPhotographerUrl(): void {

        $obj = new Photo();

        $obj->setPhotographerUrl("photographerUrl");
        $this->assertEquals("photographerUrl", $obj->getPhotographerUrl());
    }

    /**
     * Test setSrc()
     *
     * @return void
     */
    public function testSetSrc(): void {

        // Set a Source mock.
        $src = new Source();

        $obj = new Photo();

        $obj->setSrc($src);
        $this->assertSame($src, $obj->getSrc());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Photo();

        $this->assertNull($obj->getRawData());

        $this->assertNull($obj->getAlt());
        $this->assertNull($obj->getAvgColor());
        $this->assertNull($obj->getLiked());
        $this->assertNull($obj->getPhotographer());
        $this->assertNull($obj->getPhotographerUrl());
        $this->assertNull($obj->getPhotographerId());
        $this->assertNull($obj->getSrc());
    }
}
