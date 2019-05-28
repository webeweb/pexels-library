<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Provider;

use DateTime;
use Exception;
use GuzzleHttp\Client;
use InvalidArgumentException;
use WBW\Library\Pexels\API\SubstituteRequestInterface;
use WBW\Library\Pexels\Exception\APIException;
use WBW\Library\Pexels\Model\AbstractRequest;
use WBW\Library\Pexels\Traits\RateLimitTrait;

/**
 * Abstract provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Provider
 * @abstract
 */
abstract class AbstractProvider {

    use RateLimitTrait;

    /**
     * Endpoint path.
     *
     * @var string
     */
    const ENDPOINT_PATH = "https://api.pexels.com";

    /**
     * Authorization.
     *
     * @var string
     */
    private $authorization;

    /**
     * Debug.
     *
     * @var bool
     */
    private $debug;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDebug(false);
    }

    /**
     * Build a resource path.
     *
     * @param AbstractRequest $request The request.
     * @return string Returns the resource path.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    private function buildResourcePath(AbstractRequest $request) {

        if (false === ($request instanceof SubstituteRequestInterface)) {
            return $request->getResourcePath();
        }

        if (null === $request->getSubstituteValue()) {
            throw new InvalidArgumentException(sprintf("The substitute value %s is missing", $request->getSubstituteName()));
        }

        return str_replace($request->getSubstituteName(), $request->getSubstituteValue(), $request->getResourcePath());
    }

    /**
     * Call the API.
     *
     * @param AbstractRequest $request The request.
     * @param array $queryData The query data.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     */
    protected function callAPI(AbstractRequest $request, array $queryData) {

        try {

            $client = new Client([
                "base_uri"    => self::ENDPOINT_PATH . "/",
                "debug"       => $this->getDebug(),
                "headers"     => [
                    "Accept"        => "application/json",
                    "User-Agent"    => "webeweb/pexels-library",
                    "Authorization" => $this->getAuthorization(),
                ],
                "synchronous" => true,
            ]);

            $uri     = substr($this->buildResourcePath($request), 1);
            $options = [
                "query" => $queryData,
            ];

            $response = $client->request("GET", $uri, $options);

            $this->setLimit(intval($response->getHeaderLine("X-Ratelimit-Limit")));
            $this->setRemaining(intval($response->getHeaderLine("X-Ratelimit-Remaining")));
            $this->setReset(new DateTime("@" . $response->getHeaderLine("X-Ratelimit-Reset")));

            return $response->getBody()->getContents();
        } catch (InvalidArgumentException $ex) {

            throw $ex;
        } catch (Exception $ex) {

            throw new APIException("Call Pexels API failed", $ex);
        }
    }

    /**
     * Get the authorization.
     *
     * @return string Returns the authorization.
     */
    public function getAuthorization() {
        return $this->authorization;
    }

    /**
     * Get the debug.
     *
     * @return bool Returns the debug.
     */
    public function getDebug() {
        return $this->debug;
    }

    /**
     * Set the authorization.
     *
     * @param string $authorization The authorization.
     * @return AbstractProvider Returns this provider.
     */
    public function setAuthorization($authorization) {
        $this->authorization = $authorization;
        return $this;
    }

    /**
     * Set the debug.
     *
     * @param bool $debug The debug.
     * @return AbstractProvider Returns this provider.
     */
    public function setDebug($debug) {
        $this->debug = $debug;
        return $this;
    }
}
