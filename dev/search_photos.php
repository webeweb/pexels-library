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

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Source;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\SearchPhotosRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Search photos request.
$request = new SearchPhotosRequest();
$request->setQuery("YOUR QUERY");
$request->setOrientation("landscape"); // Optional
$request->setSize("large"); // Optional
$request->setLocale("en-US"); // Optional

// Call the API and get the response.
$response = $provider->searchPhotos($request);

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

/** @var Photo $current */
foreach ($response->getPhotos() as $current) {

    echo "\n";
    echo "Id: " . $current->getId() . "\n";
    echo "Width: " . $current->getWidth() . "\n";
    echo "Height: " . $current->getHeight() . "\n";
    echo "URL: " . $current->getUrl() . "\n";

    echo "Photographer: " . $current->getPhotographer() . "\n";
    echo "Photographer URL: " . $current->getPhotographerUrl() . "\n";
    echo "Photographer id: " . $current->getPhotographerId() . "\n";

    /** @var Source src */
    $src = $current->getSrc() . "\n";
    echo "Original: " . $src->getOriginal() . "\n";
    echo "Large 2x: " . $src->getLarge2x() . "\n";
    echo "Large: " . $src->getLarge() . "\n";
    echo "Medium: " . $src->getMedium() . "\n";
    echo "Small: " . $src->getSmall() . "\n";
    echo "Portrait: " . $src->getPortrait() . "\n";
    echo "Landscape: " . $src->getLandscape() . "\n";
    echo "Tiny: " . $src->getTiny() . "\n";
}
