<?php
/**
 * This file is part of the ImboClient package
 *
 * (c) Christer Edvartsen <cogo@starzinger.net>
 *
 * For the full copyright and license information, please view the LICENSE file that was
 * distributed with this source code.
 */

namespace ImboClient\Url;

/**
 * Stats URL
 *
 * @package Urls\Stats
 * @author Christer Edvartsen <cogo@starzinger.net>
 */
class Stats extends Url implements UrlInterface {
    /**
     * {@inheritdoc}
     */
    protected function getResourceUrl() {
        return sprintf(
            '%s/stats.json',
            $this->baseUrl
        );
    }
}
