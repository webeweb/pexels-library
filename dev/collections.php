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

use WBW\Library\Pexels\Model\Collection;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\CollectionsRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Collections request.
$request = new CollectionsRequest();

// Call the API and get the response.
$response = $provider->collections($request);

// Handle the response.
echo "Limit: " . $response->getLimit() . "\n";
echo "Remaining: " . $response->getRemaining() . "\n";
echo "Reset: " . $response->getReset() . "\n";

/** @var Collection $current */
foreach ($response->getCollections() as $current) {

    echo "Id:" . $current->getId() . "\n";
    echo "Title:" . $current->getTitle() . "\n";
    echo "Description:" . $current->getDescription() . "\n";
    echo "Private:" . $current->getPrivate() . "\n";
    echo "Media count:" . $current->getMediaCount() . "\n";
    echo "Photos count:" . $current->getPhotosCount() . "\n";
    echo "Video count:" . $current->getVideosCount() . "\n";
}