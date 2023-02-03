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

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\PhotoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Photo response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class PhotoResponseTest extends AbstractTestCase {

    /**
     * Tests setPhoto()
     *
     * @return void
     */
    public function testSetPhoto(): void {

        // Set a Photo mock.
        $photo = new Photo();

        $obj = new PhotoResponse();

        $obj->setPhoto($photo);
        $this->assertSame($photo, $obj->getPhoto());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new PhotoResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);

        $this->assertNull($obj->getPhoto());
    }

}
