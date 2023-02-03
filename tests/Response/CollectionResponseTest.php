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
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\CollectionResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collection response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class CollectionResponseTest extends AbstractTestCase {

    /**
     * Tests addMedia()
     *
     * @return void
     */
    public function testAddMedia(): void {

        // Set a Media mock.
        $media = new Photo();

        $obj = new CollectionResponse();

        $obj->addMedia($media);
        $this->assertSame($media, $obj->getMedias()[0]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new CollectionResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);

        $this->assertNull($obj->getId());
        $this->assertEquals([], $obj->getMedias());
        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getPrevPage());
        $this->assertNull($obj->getTotalResults());
    }
}
