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

use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Video test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model
 */
class VideoTest extends AbstractTestCase {

    /**
     * Tests the addVideoFile() method.
     *
     * @return void
     */
    public function testAddVideoFile() {

        // Set a Video file mock.
        $videoFile = new VideoFile();

        $obj = new Video();

        $obj->addVideoFile($videoFile);
        $this->assertSame($videoFile, $obj->getVideoFiles()[0]);
    }

    /**
     * Tests the addVideoPicture() method.
     *
     * @return void
     */
    public function testAddVideoPicture() {

        // Set a Video picture mock.
        $videoPicture = new VideoPicture();

        $obj = new Video();

        $obj->addVideoPicture($videoPicture);
        $this->assertSame($videoPicture, $obj->getVideoPictures()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new Video();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getDuration());
        $this->assertNull($obj->getFullRes());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getImage());
        $this->assertNull($obj->getUrl());
        $this->assertCount(0, $obj->getVideoFiles());
        $this->assertCount(0, $obj->getVideoPictures());
        $this->assertNull($obj->getWidth());
    }

    /**
     * Tests the setDuration() method.
     *
     * @return void
     */
    public function testSetDuration() {

        $obj = new Video();

        $obj->setDuration(60);
        $this->assertEquals(60, $obj->getDuration());
    }

    /**
     * Tests the setFullRes() method.
     *
     * @return void
     */
    public function testSetFullRes() {

        $obj = new Video();

        $obj->setFullRes("fullRes");
        $this->assertEquals("fullRes", $obj->getFullRes());
    }

    /**
     * Tests the setImage() method.
     *
     * @return void
     */
    public function testSetImage() {

        $obj = new Video();

        $obj->setImage("image");
        $this->assertEquals("image", $obj->getImage());
    }
}
