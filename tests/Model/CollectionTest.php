<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model;

use WBW\Library\Pexels\Model\Collection;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collection test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class CollectionTest extends AbstractTestCase {

    /**
     * Tests setMediaCount()
     *
     * @return void
     */
    public function testSetMediaCount(): void {

        $obj = new Collection();

        $obj->setMediaCount(1);
        $this->assertEquals(1, $obj->getMediaCount());
    }

    /**
     * Tests setPhotosCount()
     *
     * @return void
     */
    public function testSetPhotosCount(): void {

        $obj = new Collection();

        $obj->setPhotosCount(1);
        $this->assertEquals(1, $obj->getPhotosCount());
    }

    /**
     * Tests setPrivate()
     *
     * @return void
     */
    public function testSetPrivate(): void {

        $obj = new Collection();

        $obj->setPrivate(true);
        $this->assertTrue($obj->getPrivate());
    }

    /**
     * Tests setVideosCount()
     *
     * @return void
     */
    public function testSetVideosCount(): void {

        $obj = new Collection();

        $obj->setVideosCount(1);
        $this->assertEquals(1, $obj->getVideosCount());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Collection();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getRawData());
        $this->assertNull($obj->getTitle());

        $this->assertNull($obj->getMediaCount());
        $this->assertNull($obj->getPhotosCount());
        $this->assertNull($obj->getPrivate());
        $this->assertNull($obj->getVideosCount());
    }
}
