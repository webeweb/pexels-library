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

use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Source test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class SourceTest extends AbstractTestCase {

    /**
     * Tests setLandscape()
     *
     * @return void
     */
    public function testSetLandscape(): void {

        $obj = new Source();

        $obj->setLandscape("landscape");
        $this->assertEquals("landscape", $obj->getLandscape());
    }

    /**
     * Tests setLarge()
     *
     * @return void
     */
    public function testSetLarge(): void {

        $obj = new Source();

        $obj->setLarge("large");
        $this->assertEquals("large", $obj->getLarge());
    }

    /**
     * Tests setLarge2x()
     *
     * @return void
     */
    public function testSetLarge2x(): void {

        $obj = new Source();

        $obj->setLarge2x("large2x");
        $this->assertEquals("large2x", $obj->getLarge2x());
    }

    /**
     * Tests setMedium()
     *
     * @return void
     */
    public function testSetMedium(): void {

        $obj = new Source();

        $obj->setMedium("medium");
        $this->assertEquals("medium", $obj->getMedium());
    }

    /**
     * Tests setOriginal()
     *
     * @return void
     */
    public function testSetOriginal(): void {

        $obj = new Source();

        $obj->setOriginal("original");
        $this->assertEquals("original", $obj->getOriginal());
    }

    /**
     * Tests setPortrait()
     *
     * @return void
     */
    public function testSetPortrait(): void {

        $obj = new Source();

        $obj->setPortrait("portrait");
        $this->assertEquals("portrait", $obj->getPortrait());
    }

    /**
     * Tests setSmall()
     *
     * @return void
     */
    public function testSetSmall(): void {

        $obj = new Source();

        $obj->setSmall("small");
        $this->assertEquals("small", $obj->getSmall());
    }

    /**
     * Tests setTiny()
     *
     * @return void
     */
    public function testSetTiny(): void {

        $obj = new Source();

        $obj->setTiny("tiny");
        $this->assertEquals("tiny", $obj->getTiny());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Source();

        $this->assertNull($obj->getRawData());

        $this->assertNull($obj->getLandscape());
        $this->assertNull($obj->getLarge());
        $this->assertNull($obj->getLarge2x());
        $this->assertNull($obj->getMedium());
        $this->assertNull($obj->getOriginal());
        $this->assertNull($obj->getPortrait());
        $this->assertNull($obj->getSmall());
        $this->assertNull($obj->getTiny());
    }
}
