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

class PhotoTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Photo();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getPhotographer());
        $this->assertNull($obj->getPhotographerUrl());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getSrc());
        $this->assertNull($obj->getUrl());
    }

    /**
     * Tests the setHeight() method.
     *
     * @return void
     */
    public function testSetHeight() {

        $obj = new Photo();

        $obj->setHeight(1000);
        $this->assertEquals(1000, $obj->getHeight());
    }

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
     * Tests the setWidth() method.
     *
     * @return void
     */
    public function testSetWidth() {

        $obj = new Photo();

        $obj->setWidth(1000);
        $this->assertEquals(1000, $obj->getWidth());
    }
}
