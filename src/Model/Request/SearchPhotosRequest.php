<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Request;

use WBW\Library\Core\Model\Attribute\IntegerPageTrait;
use WBW\Library\Core\Model\Attribute\StringQueryTrait;
use WBW\Library\Pexels\Model\AbstractRequest;
use WBW\Library\Pexels\Model\Attribute\IntegerPerPageTrait;

/**
 * Search photos request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class SearchPhotosRequest extends AbstractRequest {

    use IntegerPageTrait;
    use IntegerPerPageTrait;
    use StringQueryTrait;

    /**
     * Search photos resource path.
     *
     * @var string
     */
    const SEARCH_PHOTOS_RESOURCE_PATH = "/v1/search";

    /**
     * Locale.
     *
     * @var string|null
     */
    private $locale;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->setPage(1);
        $this->setPerPage(static::PER_PAGE_DEFAULT);
    }

    /**
     * Get the locale.
     *
     * @return string|null Returns the locale.
     */
    public function getLocale(): ?string {
        return $this->locale;
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return static::SEARCH_PHOTOS_RESOURCE_PATH;
    }

    /**
     * Set the locale.
     *
     * @param string|null $locale The locale.
     * @return SearchPhotosRequest Returns this search photos request.
     */
    public function setLocale(?string $locale): SearchPhotosRequest {
        $this->locale = $locale;
        return $this;
    }
}
