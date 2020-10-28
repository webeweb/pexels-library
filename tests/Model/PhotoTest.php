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
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model
 */
class PhotoTest extends AbstractTestCase {

    /**
     * Tests the setPhotographer() method.
     *
     * @return void
     */
    public function testSetPhotographer() {

        $obj = new Photo();

        $obj->setPhotographer("photographer");
        $this->assertEquals("photographer", $obj->getPhotographer());
    }

    /**
     * Tests the setPhotographerId() method.
     *
     * @return void
     */
    public function testSetPhotographerId() {

        $obj = new Photo();

        $obj->setPhotographerId("photographerId");
        $this->assertEquals("photographerId", $obj->getPhotographerId());
    }

    /**
     * Tests the setPhotographerUrl() method.
     *
     * @return void
     */
    public function testSetPhotographerUrl() {

        $obj = new Photo();

        $obj->setPhotographerUrl("photographerUrl");
        $this->assertEquals("photographerUrl", $obj->getPhotographerUrl());
    }

    /**
     * Tests the setSrc() method.
     *
     * @return void
     */
    public function testSetSrc() {

        // Set a Source mock.
        $src = new Source();

        $obj = new Photo();

        $obj->setSrc($src);
        $this->assertSame($src, $obj->getSrc());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new Photo();

        $this->assertNull($obj->getPhotographer());
        $this->assertNull($obj->getPhotographerUrl());
        $this->assertNull($obj->getSrc());
    }
}
