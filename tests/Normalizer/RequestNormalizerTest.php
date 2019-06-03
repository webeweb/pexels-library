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

use Exception;
use InvalidArgumentException;
use WBW\Library\Pexels\Model\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Model\Request\PopularVideosRequest;
use WBW\Library\Pexels\Model\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Model\Request\SearchVideosRequest;
use WBW\Library\Pexels\Normalizer\RequestNormalizer;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Request normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Normalizer
 */
class RequestNormalizerTest extends AbstractTestCase {

    /**
     * Tests the normalizeCuratedPhotosRequest() method.
     *
     * @return void
     */
    public function testNormalizeCuratedPhotosRequest() {

        // Set a Curated photos request mock.
        $curatedPhotosRequest = new CuratedPhotosRequest();
        $curatedPhotosRequest->setPerPage(80);
        $curatedPhotosRequest->setPage(2);

        $res = RequestNormalizer::normalizeCuratedPhotosRequest($curatedPhotosRequest);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
    }

    /**
     * Tests the normalizePopularVideosRequest() method.
     *
     * @return void
     */
    public function testNormalizePopularVideosRequest() {

        // Set a Popular videos request mock.
        $popularVideosRequest = new PopularVideosRequest();
        $popularVideosRequest->setPerPage(80);
        $popularVideosRequest->setPage(2);
        $popularVideosRequest->setMinWidth(1280);
        $popularVideosRequest->setMaxWidth(1920);
        $popularVideosRequest->setMinDuration(1);
        $popularVideosRequest->setMaxDuration(60);

        $res = RequestNormalizer::normalizePopularVideosRequest($popularVideosRequest);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1920, $res["max_width"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
    }

    /**
     * Tests the normalizeSearchPhotosRequest() method.
     *
     * @return void
     */
    public function testNormalizeSearchPhotosRequest() {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();
        $searchPhotosRequest->setQuery("github");
        $searchPhotosRequest->setPerPage(80);
        $searchPhotosRequest->setPage(2);

        $res = RequestNormalizer::normalizeSearchPhotosRequest($searchPhotosRequest);
        $this->assertEquals("github", $res["query"]);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
    }

    /**
     * Tests the normalizeSearchPhotosRequest() method.
     *
     * @return void
     */
    public function testNormalizeSearchPhotosRequestWithInvalidArgumentException() {

        // Set a Search photos request mock.
        $searchPhotosRequest = new SearchPhotosRequest();

        try {

            RequestNormalizer::normalizeSearchPhotosRequest($searchPhotosRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The mandatory parameter \"query\" is missing", $ex->getMessage());
        }
    }

    /**
     * Tests the normalizeSearchVideosRequest() method.
     *
     * @return void
     */
    public function testNormalizeSearchVideosRequest() {

        // Set a Search videos request mock.
        $searchVideosRequest = new SearchVideosRequest();
        $searchVideosRequest->setQuery("github");
        $searchVideosRequest->setPerPage(80);
        $searchVideosRequest->setPage(2);
        $searchVideosRequest->setMinWidth(1280);
        $searchVideosRequest->setMaxWidth(1920);
        $searchVideosRequest->setMinDuration(1);
        $searchVideosRequest->setMaxDuration(60);

        $res = RequestNormalizer::normalizeSearchVideosRequest($searchVideosRequest);
        $this->assertEquals("github", $res["query"]);
        $this->assertEquals(80, $res["per_page"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1920, $res["max_width"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
    }

    /**
     * Tests the normalizeSearchVideosRequest() method.
     *
     * @return void
     */
    public function testNormalizeSearchVideosRequestWithInvalidArgumentException() {

        // Set a Search videos request mock.
        $searchPhotosRequest = new SearchVideosRequest();

        try {

            RequestNormalizer::normalizeSearchVideosRequest($searchPhotosRequest);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The mandatory parameter \"query\" is missing", $ex->getMessage());
        }
    }
}
