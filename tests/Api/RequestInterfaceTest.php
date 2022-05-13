<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Api;

use WBW\Library\Pexels\Api\RequestInterface;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Request interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\API
 */
class RequestInterfaceTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("red", RequestInterface::COLOR_RED);
        $this->assertEquals("orange", RequestInterface::COLOR_ORANGE);
        $this->assertEquals("yellow", RequestInterface::COLOR_YELLOW);
        $this->assertEquals("green", RequestInterface::COLOR_GREEN);
        $this->assertEquals("turquoise", RequestInterface::COLOR_TURQUOISE);
        $this->assertEquals("blue", RequestInterface::COLOR_BLUE);
        $this->assertEquals("violet", RequestInterface::COLOR_VIOLET);
        $this->assertEquals("pink", RequestInterface::COLOR_PINK);
        $this->assertEquals("brown", RequestInterface::COLOR_BROWN);
        $this->assertEquals("black", RequestInterface::COLOR_BLACK);
        $this->assertEquals("gray", RequestInterface::COLOR_GRAY);
        $this->assertEquals("white", RequestInterface::COLOR_WHITE);

        $this->assertEquals("en-US", RequestInterface::LOCALE_EN_US);
        $this->assertEquals("pt-BR", RequestInterface::LOCALE_PT_BR);
        $this->assertEquals("es-ES", RequestInterface::LOCALE_ES_ES);
        $this->assertEquals("ca-ES", RequestInterface::LOCALE_CA_ES);
        $this->assertEquals("de-DE", RequestInterface::LOCALE_DE_DE);
        $this->assertEquals("it-IT", RequestInterface::LOCALE_IT_IT);
        $this->assertEquals("fr-FR", RequestInterface::LOCALE_FR_FR);
        $this->assertEquals("sv-SE", RequestInterface::LOCALE_SV_SE);
        $this->assertEquals("id-ID", RequestInterface::LOCALE_ID_ID);
        $this->assertEquals("pl-PL", RequestInterface::LOCALE_PL_PL);
        $this->assertEquals("ja-JP", RequestInterface::LOCALE_JA_JP);
        $this->assertEquals("zh-TW", RequestInterface::LOCALE_ZH_TW);
        $this->assertEquals("zh-CN", RequestInterface::LOCALE_ZH_CN);
        $this->assertEquals("ko-KR", RequestInterface::LOCALE_KO_KR);
        $this->assertEquals("th-TH", RequestInterface::LOCALE_TH_TH);
        $this->assertEquals("nl-NL", RequestInterface::LOCALE_NL_NL);
        $this->assertEquals("hu-HU", RequestInterface::LOCALE_HU_HU);
        $this->assertEquals("vi-VN", RequestInterface::LOCALE_VI_VN);
        $this->assertEquals("cs-CZ", RequestInterface::LOCALE_CS_CZ);
        $this->assertEquals("da-DK", RequestInterface::LOCALE_DA_DK);
        $this->assertEquals("fi-FI", RequestInterface::LOCALE_FI_FI);
        $this->assertEquals("uk-UA", RequestInterface::LOCALE_UK_UA);
        $this->assertEquals("el-GR", RequestInterface::LOCALE_EL_GR);
        $this->assertEquals("ro-RO", RequestInterface::LOCALE_RO_RO);
        $this->assertEquals("nb-NO", RequestInterface::LOCALE_NB_NO);
        $this->assertEquals("sk-SK", RequestInterface::LOCALE_SK_SK);
        $this->assertEquals("tr-TR", RequestInterface::LOCALE_TR_TR);
        $this->assertEquals("ru-RU", RequestInterface::LOCALE_RU_RU);

        $this->assertEquals("landscape", RequestInterface::ORIENTATION_LANDSCAPE);
        $this->assertEquals("portrait", RequestInterface::ORIENTATION_PORTRAIT);
        $this->assertEquals("square", RequestInterface::ORIENTATION_SQUARE);

        $this->assertEquals(15, RequestInterface::PER_PAGE_DEFAULT);
        $this->assertEquals(80, RequestInterface::PER_PAGE_MAX);

        $this->assertEquals("large", RequestInterface::SIZE_LARGE);
        $this->assertEquals("medium", RequestInterface::SIZE_MEDIUM);
        $this->assertEquals("small", RequestInterface::SIZE_SMALL);
    }
}
