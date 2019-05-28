<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Response;

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Photo response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Response
 */
class PhotoResponseTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new PhotoResponse();

        $this->assertNull($obj->getPhoto());
    }

    /**
     * Tests the setPhoto() method.
     *
     * @return void
     */
    public function testSetPhoto() {

        // Set a Photo mock.
        $photo = new Photo();

        $obj = new PhotoResponse();

        $obj->setPhoto($photo);
        $this->assertSame($photo, $obj->getPhoto());
    }

}
