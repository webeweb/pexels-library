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
     * Sample photos response.
     *
     * @var string
     */
    const SAMPLE_PHOTOS_RESPONSE = <<< 'EOT'
{
    "total_results": 6,
    "page": 1,
    "per_page": 15,
    "photos": [
        {
            "id": 1181292,
            "width": 3756,
            "height": 5627,
            "url": "https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/",
            "photographer": "Christina Morillo",
            "photographer_url": "https://www.pexels.com/@divinetechygirl",
            "photographer_id": 680589,
            "src": {
                "original": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg",
                "large2x": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                "large": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=650&w=940",
                "medium": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=350",
                "small": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&h=130",
                "portrait": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=1200&w=800",
                "landscape": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=627&w=1200",
                "tiny": "https://images.pexels.com/photos/1181292/pexels-photo-1181292.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=200&w=280"
            }
        }
    ]
}
EOT;

    /**
     * Sample videos response.
     *
     * @var string
     */
    const SAMPLE_VIDEOS_RESPONSE = <<< 'EOT'
{
    "page": 1,
    "per_page": 15,
    "total_results": 7206,
    "url": "http://api-videos.pexels.com/popular-videos",
    "videos": [
        {
            "id": 1972034,
            "width": 1920,
            "height": 1080,
            "url": "https://videos.pexels.com/videos/following-a-woman-in-slow-motion-1972034",
            "image": "https://images.pexels.com/videos/1972034/free-video-1972034.jpg?fit=crop&w=1200&h=630&auto=compress&cs=tinysrgb",
            "full_res": null,
            "duration": 129,
            "user": {
                "id": 680589,
                "name": "Joey Farina",
                "url": "https://www.pexels.com/@joey"
            },
            "video_files": [
                {
                    "id": 81787,
                    "quality": "hd",
                    "file_type": "video/mp4",
                    "width": 1280,
                    "height": 720,
                    "link": "https://player.vimeo.com/external/320621378.hd.mp4?s=3311792d05f51c075d5b7f7c0fb10fd01df68aad&profile_id=174&oauth2_token_id=57447761"
                },
                {
                    "id": 81788,
                    "quality": "sd",
                    "file_type": "video/mp4",
                    "width": 640,
                    "height": 360,
                    "link": "https://player.vimeo.com/external/320621378.sd.mp4?s=9f704fce983c9c862e4c26e33ed38510e448bdfb&profile_id=164&oauth2_token_id=57447761"
                },
                {
                    "id": 81789,
                    "quality": "hls",
                    "file_type": "video/mp4",
                    "width": null,
                    "height": null,
                    "link": "https://player.vimeo.com/external/320621378.m3u8?s=b3fb6feeccb2a7eac76f76dca4bc487f340b6db0&oauth2_token_id=57447761"
                }
            ],
            "video_pictures": [
                {
                    "id": 199681,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-0.jpg",
                    "nr": 0
                },
                {
                    "id": 199682,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-1.jpg",
                    "nr": 1
                },
                {
                    "id": 199683,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-2.jpg",
                    "nr": 2
                },
                {
                    "id": 199684,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-3.jpg",
                    "nr": 3
                },
                {
                    "id": 199685,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-4.jpg",
                    "nr": 4
                },
                {
                    "id": 199686,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-5.jpg",
                    "nr": 5
                },
                {
                    "id": 199687,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-6.jpg",
                    "nr": 6
                },
                {
                    "id": 199688,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-7.jpg",
                    "nr": 7
                },
                {
                    "id": 199689,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-8.jpg",
                    "nr": 8
                },
                {
                    "id": 199690,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-9.jpg",
                    "nr": 9
                },
                {
                    "id": 199691,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-10.jpg",
                    "nr": 10
                },
                {
                    "id": 199692,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-11.jpg",
                    "nr": 11
                },
                {
                    "id": 199693,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-12.jpg",
                    "nr": 12
                },
                {
                    "id": 199694,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-13.jpg",
                    "nr": 13
                },
                {
                    "id": 199695,
                    "picture": "https://static-videos.pexels.com/videos/1972034/pictures/preview-14.jpg",
                    "nr": 14
                }
            ]
        }
    ]
}
EOT;
}
