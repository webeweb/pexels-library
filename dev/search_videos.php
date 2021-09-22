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
use WBW\Library\Pexels\Request\SearchVideosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Search videos request.
$request = new SearchVideosRequest();
$request->setQuery("YOUR QUERY");
$request->setOrientation("landscape"); // Optional
$request->setSize("large"); // Optional
$request->setLocale("en-US"); // Optional

// Call the API and get the response.
$response = $provider->searchVideos($request);

// Handle the response.
echo "Limit: " . $response->getLimit() . "\n";
echo "Remaining: " . $response->getRemaining() . "\n";
echo "Reset: " . $response->getReset() . "\n";

echo "Per page: " . $response->getPerPage() . "\n";
echo "Page: " . $response->getPage() . "\n";
echo "Total results: " . $response->getTotalResults() . "\n";

echo "Prev page: " . $response->getPrevPage() . "\n";
echo "Next page: " . $response->getNextPage() . "\n";

echo "URL: " . $response->getUrl() . "\n";

/** @var Video $current */
foreach ($response->getVideos() as $current) {

    echo "\n";
    echo "Id:" . $current->getId() . "\n";
    echo "Width:" . $current->getWidth() . "\n";
    echo "Height:" . $current->getHeight() . "\n";
    echo "URL:" . $current->getUrl() . "\n";

    echo "Image:" . $current->getImage() . "\n";
    echo "Full res:" . $current->getFullRes() . "\n";
    echo "Duration:" . $current->getDuration() . "\n";

    /** @var User $user */
    $user = $current->getUser() . "\n";
    echo "Id:" . $user->getId() . "\n";
    echo "Name:" . $user->getName() . "\n";
    echo "Url:" . $user->getUrl() . "\n";

    /** @var VideoFile[] $videoFiles */
    $videoFiles = $current->getVideosFiles();
    foreach ($videoFiles as $vf) {

        echo "Id:" . $vf->getId() . "\n";
        echo "Quality:" . $vf->getQuality() . "\n";
        echo "File type:" . $vf->getFileType() . "\n";
        echo "Width:" . $vf->getWidth() . "\n";
        echo "Height:" . $vf->getHeight() . "\n";
        echo "Link:" . $vf->getLink() . "\n";
    }

    /** @var VideoPicture[] $videoPictures */
    $videoPictures = $current->getVideosPictures();
    foreach ($videoPictures as $vp) {

        echo "Id:" . $vp->getId() . "\n";
        echo "Picture:" . $vp->getPicture() . "\n";
        echo "Nr:" . $vp->getNr() . "\n";
    }
}
