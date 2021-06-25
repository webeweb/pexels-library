<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Response;

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Response\TestMediaResponse;

/**
 * Abstract media response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Response
 */
class AbstractMediaResponseTest extends AbstractTestCase {

    /**
     * Tests the addMedia() method.
     *
     * @return void
     */
    public function testAddMedia(): void {

        // Set a Media mock.
        $media = new Photo();

        $obj = new TestMediaResponse();

        $obj->addMedia($media);
        $this->assertSame($media, $obj->getMedias()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestMediaResponse();

        $this->assertEquals([], $obj->getMedias());
    }
}