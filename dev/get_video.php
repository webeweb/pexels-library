<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . "/../vendor/autoload.php";

use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Model\VideoFile;
use WBW\Library\Pexels\Model\VideoPicture;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\GetVideoRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Get video request.
$request = new GetVideoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getVideo($request);

// Handle the response.
echo "Limit: " . $response->getLimit() . "\n";
echo "Remaining: " . $response->getRemaining() . "\n";
echo "Reset: " . $response->getReset() . "\n";

/** @var Video $video */
$video = $response->getVideo();
echo "Id:" . $video->getId() . "\n";
echo "Width:" . $video->getWidth() . "\n";
echo "Height:" . $video->getHeight() . "\n";
echo "URL:" . $video->getUrl() . "\n";

echo "Image:" . $video->getImage() . "\n";
echo "Full res:" . $video->getFullRes() . "\n";
echo "Duration:" . $video->getDuration() . "\n";

/** @var User $user */
$user = $video->getUser() . "\n";
echo "Id:" . $user->getId() . "\n";
echo "Name:" . $user->getName() . "\n";
echo "Url:" . $user->getUrl() . "\n";

/** @var VideoFile[] $videoFiles */
$videoFiles = $video->getVideosFiles();
foreach ($videoFiles as $vf) {

    echo "Id:" . $vf->getId() . "\n";
    echo "Quality:" . $vf->getQuality() . "\n";
    echo "File type:" . $vf->getFileType() . "\n";
    echo "Width:" . $vf->getWidth() . "\n";
    echo "Height:" . $vf->getHeight() . "\n";
    echo "Link:" . $vf->getLink() . "\n";
}

/** @var VideoPicture[] $videoPictures */
$videoPictures = $video->getVideosPictures();
foreach ($videoPictures as $vp) {

    echo "Id:" . $vp->getId() . "\n";
    echo "Picture:" . $vp->getPicture() . "\n";
    echo "Nr:" . $vp->getNr() . "\n";
}
