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
use Psr\Log\LoggerInterface;
use WBW\Library\Pexels\API\PaginateResponseInterface;
use WBW\Library\Pexels\API\SubstituteRequestInterface;
use WBW\Library\Pexels\Exception\APIException;
use WBW\Library\Pexels\Model\AbstractRequest;
use WBW\Library\Pexels\Model\RateLimitTrait;

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
     * Logger.
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor.
     *
     * @param string $authorization The authorization.
     * @param LoggerInterface|null $logger The logger.
     */
    public function __construct($authorization = null, LoggerInterface $logger = null) {
        $this->setAuthorization($authorization);
        $this->setDebug(false);
        $this->setLogger($logger);
    }

    /**
     * Build the configuration.
     *
     * @return array Returns the configuration.
     */
    private function buildConfiguration() {
        return [
            "debug"       => $this->getDebug(),
            "headers"     => [
                "Accept"        => "application/json",
                "User-Agent"    => "webeweb/pexels-library",
                "Authorization" => $this->getAuthorization(),
            ],
            "synchronous" => true,
        ];
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
     * @param string $uri The URI.
     * @param array $queryData The query data.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    private function callAPI($uri, array $queryData) {

        if (null === $this->getAuthorization()) {
            throw new InvalidArgumentException("The mandatory parameter \"authorization\" is missing");
        }

        try {

            $config = $this->buildConfiguration();

            $client = new Client($config);

            $method  = "GET";
            $options = 0 < count($queryData) ? ["query" => $queryData] : [];

            $this->logInfo(sprintf("Call Pexels API %s %s", $method, $uri), ["config" => $config, "options" => $options]);

            $response = $client->request($method, $uri, $options);

            $this->setLimit(intval($response->getHeaderLine("X-Ratelimit-Limit")));
            $this->setRemaining(intval($response->getHeaderLine("X-Ratelimit-Remaining")));
            $this->setReset(new DateTime("@" . $response->getHeaderLine("X-Ratelimit-Reset")));

            return $response->getBody()->getContents();
        } catch (Exception $ex) {

            throw new APIException("Call Pexels API failed", $ex);
        }
    }

    /**
     * Call the API.
     *
     * @param AbstractRequest $request The request.
     * @param array $queryData The query data.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    protected function callAPIWithRequest(AbstractRequest $request, array $queryData) {

        try {

            $uri = self::ENDPOINT_PATH . $this->buildResourcePath($request);

            return $this->callAPI($uri, $queryData);
        } catch (InvalidArgumentException $ex) {

            throw $ex;
        }
    }

    /**
     * Call the API.
     *
     * @param PaginateResponseInterface $response The request.
     * @param bool $nextPage Next page ?.
     * @return string Returns the raw response.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    protected function callAPIWithResponse(PaginateResponseInterface $response, $nextPage) {

        try {

            $uri = false === $nextPage ? $response->getPrevPage() : $response->getNextPage();
            if (null === $uri) {
                return "";
            }

            return $this->callAPI($uri, []);
        } catch (InvalidArgumentException $ex) {

            throw $ex;
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
     * Get the logger.
     *
     * @return LoggerInterface Returns the logger.
     */
    public function getLogger() {
        return $this->logger;
    }

    /**
     * Log an info.
     *
     * @param string $message The message.
     * @param array $context The context.
     * @return AbstractProvider Returns this provider.
     */
    protected function logInfo($message, array $context) {
        if (null !== $this->getLogger()) {
            $this->getLogger()->info($message, $context);
        }
        return $this;
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

    /**
     * Set the logger.
     *
     * @param LoggerInterface|null $logger The logger
     * @return AbstractProvider Returns this provider
     */
    protected function setLogger(LoggerInterface $logger = null) {
        $this->logger = $logger;
        return $this;
    }
}
