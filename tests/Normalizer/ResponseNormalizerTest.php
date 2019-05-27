<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Normalizer;

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Response\PhotoResponse;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Normalizer\TestResponseNormalizer;
use WBW\Library\Pexels\Tests\Fixtures\TestFixtures;

/**
 * Response normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Normalizer
 */
class ResponseNormalizerTest extends AbstractTestCase {

    /**
     * Tests the denormalizePhoto() method.
     *
     * @return void
     */
    public function testDenormalizePhoto() {

        $arg = json_decode(TestFixtures::SAMPLE_RESPONSE, true)["photos"][0];

        $obj = TestResponseNormalizer::denormalizePhoto($arg);
        $this->assertInstanceOf(Photo::class, $obj);

        $this->assertEquals(1000, $obj->getHeight());
        $this->assertEquals("Name", $obj->getPhotographer());
        $this->assertNotNull($obj->getSrc());

        $this->assertEquals("https://www.pexels.com/photo/12345", $obj->getUrl());
        $this->assertEquals(1000, $obj->getWidth());
    }

    /**
     * Tests the denormalizePhotoResponse() method.
     *
     * @return void
     */
    public function testDenormalizePhotoResponse() {

        $obj = TestResponseNormalizer::denormalizePhotoResponse(TestFixtures::SAMPLE_RESPONSE);
        $this->assertInstanceOf(PhotoResponse::class, $obj);

        $this->assertEquals("https://api.pexels.com/v1/search/?page=2&per_page=15&query=example+query", $obj->getNextPage());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertEquals(236, $obj->getTotalResults());
        $this->assertEquals("https://www.pexels.com/search/example%20query/", $obj->getUrl());

        $this->assertCount(1, $obj->getPhotos());
    }

    /**
     * Tests the denormalizePhotoResponse() method.
     *
     * @return void
     */
    public function testDenormalizePhotoResponseWithBadRawResponse() {

        $obj = TestResponseNormalizer::denormalizePhotoResponse("");
        $this->assertInstanceOf(PhotoResponse::class, $obj);

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());

        $this->assertCount(0, $obj->getPhotos());
    }

    /**
     * Tests the denormalizeSource() method.
     *
     * @return void
     */
    public function testDenormalizeSource() {

        $arg = json_decode(TestFixtures::SAMPLE_RESPONSE, true)["photos"][0]["src"];

        $obj = TestResponseNormalizer::denormalizeSource($arg);
        $this->assertInstanceOf(Source::class, $obj);

        $this->assertEquals("https://*-landscape.jpg", $obj->getLandscape());
        $this->assertEquals("https://*-large.jpg", $obj->getLarge());
        $this->assertEquals("https://*-large2x.jpg", $obj->getLarge2x());
        $this->assertEquals("https://*-medium.jpg", $obj->getMedium());
        $this->assertEquals("https://*-original.jpg", $obj->getOriginal());
        $this->assertEquals("https://*-portrait.jpg", $obj->getPortrait());
        $this->assertEquals("https://*-small.jpg", $obj->getSmall());
        $this->assertEquals("https://*-tiny.jpg", $obj->getTiny());
    }
}
