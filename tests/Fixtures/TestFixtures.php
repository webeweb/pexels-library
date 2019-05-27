<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Fixtures
 */
class TestFixtures {

    /**
     * Sample response.
     *
     * @var string
     */
    const SAMPLE_RESPONSE = <<< 'EOT'
{
    "page": 1,
    "per_page":15,
    "total_results":236,
    "url":"https://www.pexels.com/search/example%20query/",
    "next_page":"https://api.pexels.com/v1/search/?page=2&per_page=15&query=example+query",
    "photos":[
        {
            "width":1000,
            "height":1000,
            "url":"https://www.pexels.com/photo/12345",
            "photographer":"Name",
            "src":{
                "original":"https://*-original.jpg",
                "large":"https://*-large.jpg",
                "large2x":"https://*-large2x.jpg",
                "medium":"https://*-medium.jpg",
                "small":"https://*-small.jpg",
                "portrait":"https://*-portrait.jpg",
                "landscape":"https://*-landscape.jpg",
                "tiny":"https://*-tiny.jpg"
            }
        }
    ]
}
EOT;

}
