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

use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Video test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class VideoTest extends AbstractTestCase {

    /**
     * Tests addVideoFile()
     *
     * @return void
     */
    public function testAddVideoFile(): void {

        // Set a Video file mock.
        $videoFile = new VideoFile();

        $obj = new Video();

        $obj->addVideoFile($videoFile);
        $this->assertSame($videoFile, $obj->getVideoFiles()[0]);
    }

    /**
     * Tests addVideoPicture()
     *
     * @return void
     */
    public function testAddVideoPicture(): void {

        // Set a Video picture mock.
        $videoPicture = new VideoPicture();

        $obj = new Video();

        $obj->addVideoPicture($videoPicture);
        $this->assertSame($videoPicture, $obj->getVideoPictures()[0]);
    }

    /**
     * Tests setDuration()
     *
     * @return void
     */
    public function testSetDuration(): void {

        $obj = new Video();

        $obj->setDuration(60);
        $this->assertEquals(60, $obj->getDuration());
    }

    /**
     * Tests setFullRes()
     *
     * @return void
     */
    public function testSetFullRes(): void {

        $obj = new Video();

        $obj->setFullRes("fullRes");
        $this->assertEquals("fullRes", $obj->getFullRes());
    }

    /**
     * Tests setImage()
     *
     * @return void
     */
    public function testSetImage(): void {

        $obj = new Video();

        $obj->setImage("image");
        $this->assertEquals("image", $obj->getImage());
    }

    /**
     * Tests setUser()
     *
     * @return void
     */
    public function testSetUser(): void {

        // Set an User mock.
        $user = new User();

        $obj = new Video();

        $obj->setUser($user);
        $this->assertSame($user, $obj->getUser());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new Video();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getWidth());
        $this->assertNull($obj->getUrl());

        $this->assertNull($obj->getRawData());

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getDuration());
        $this->assertNull($obj->getFullRes());
        $this->assertNull($obj->getImage());
        $this->assertNull($obj->getUser());
        $this->assertCount(0, $obj->getVideoFiles());
        $this->assertCount(0, $obj->getVideoPictures());
    }
}
