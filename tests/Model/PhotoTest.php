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
     * Tests setAlt()
     *
     * @return void
     */
    public function testSetAlt(): void {

        $obj = new Photo();

        $obj->setAlt("alt");
        $this->assertEquals("alt", $obj->getAlt());
    }

    /**
     * Tests setAvgColor()
     *
     * @return void
     */
    public function testSetAvgColor(): void {

        $obj = new Photo();

        $obj->setAvgColor("avgColor");
        $this->assertEquals("avgColor", $obj->getAvgColor());
    }

    /**
     * Tests setLiked()
     *
     * @return void
     */
    public function testSetLiked(): void {

        $obj = new Photo();

        $obj->setLiked(true);
        $this->assertTrue($obj->getLiked());
    }

    /**
     * Tests setPhotographer()
     *
     * @return void
     */
    public function testSetPhotographer(): void {

        $obj = new Photo();

        $obj->setPhotographer("photographer");
        $this->assertEquals("photographer", $obj->getPhotographer());
    }

    /**
     * Tests setPhotographerId()
     *
     * @return void
     */
    public function testSetPhotographerId(): void {

        $obj = new Photo();

        $obj->setPhotographerId("photographerId");
        $this->assertEquals("photographerId", $obj->getPhotographerId());
    }

    /**
     * Tests setPhotographerUrl()
     *
     * @return void
     */
    public function testSetPhotographerUrl(): void {

        $obj = new Photo();

        $obj->setPhotographerUrl("photographerUrl");
        $this->assertEquals("photographerUrl", $obj->getPhotographerUrl());
    }

    /**
     * Tests setSrc()
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
     * Tests __construct()
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
