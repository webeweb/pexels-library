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

use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Video file test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model
 */
class VideoFileTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new VideoFile();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getFileType());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getLink());
        $this->assertNull($obj->getQuality());
        $this->assertNull($obj->getWidth());
    }

    /**
     * Tests the setFileType() method.
     *
     * @return void
     */
    public function testSetFileType() {

        $obj = new VideoFile();

        $obj->setFileType("fileType");
        $this->assertEquals("fileType", $obj->getFileType());
    }

    /**
     * Tests the setQuality() method.
     *
     * @return void
     */
    public function testSetQuality() {

        $obj = new VideoFile();

        $obj->setQuality("quality");
        $this->assertEquals("quality", $obj->getQuality());
    }
}
