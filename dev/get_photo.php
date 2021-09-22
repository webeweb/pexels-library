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
use WBW\Library\Pexels\Request\GetPhotoRequest;

// Create the API provider.
$provider = new ApiProvider("YOUR_API_KEY");

// Create a Get photo request.
$request = new GetPhotoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getPhoto($request);

// Handle the response.
echo "Limit: " . $response->getLimit() . "\n";
echo "Remaining: " . $response->getRemaining() . "\n";
echo "Reset: " . $response->getReset() . "\n";

/** @var Photo $photo */
$photo = $response->getPhoto();
echo "Id: " . $photo->getId() . "\n";
echo "Width: " . $photo->getWidth() . "\n";
echo "Height: " . $photo->getHeight() . "\n";
echo "URL: " . $photo->getUrl() . "\n";

echo "Photographer: " . $photo->getPhotographer() . "\n";
echo "Photographer URL: " . $photo->getPhotographerUrl() . "\n";
echo "Photographer id: " . $photo->getPhotographerId() . "\n";

/** @var Source src */
$src = $photo->getSrc() . "\n";
echo "Original: " . $src->getOriginal() . "\n";
echo "Large 2x: " . $src->getLarge2x() . "\n";
echo "Large: " . $src->getLarge() . "\n";
echo "Medium: " . $src->getMedium() . "\n";
echo "Small: " . $src->getSmall() . "\n";
echo "Portrait: " . $src->getPortrait() . "\n";
echo "Landscape: " . $src->getLandscape() . "\n";
echo "Tiny: " . $src->getTiny() . "\n";
