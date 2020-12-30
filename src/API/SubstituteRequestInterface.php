<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\API;

/**
 * Substitute request interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\API
 */
interface SubstituteRequestInterface {

    /**
     * Get the substitute name.
     *
     * @return string Returns the substitute name.
     */
    public function getSubstituteName(): string;

    /**
     * Get the substitute value.
     *
     * @return mixed Returns the substitute value.
     */
    public function getSubstituteValue();
}
