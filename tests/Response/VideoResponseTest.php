<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Response;

use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Video response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class VideoResponseTest extends AbstractTestCase {

    /**
     * Tests setVideo()
     *
     * @return void
     */
    public function testSetVideo(): void {

        // Set a Video mock.
        $video = new Video();

        $obj = new VideoResponse();

        $obj->setVideo($video);
        $this->assertSame($video, $obj->getVideo());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new VideoResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);

        $this->assertNull($obj->getVideo());
    }

}
