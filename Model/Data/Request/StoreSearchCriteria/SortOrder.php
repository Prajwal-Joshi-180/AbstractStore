<?php

/*******************************************************************************
 * ADOBE CONFIDENTIAL
 * ___________________
 *
 * Copyright 2022 Adobe
 * All Rights Reserved.
 *
 * NOTICE: All information contained herein is, and remains
 * the property of Adobe and its suppliers, if any. The intellectual
 * and technical concepts contained herein are proprietary to Adobe
 * and its suppliers and are protected by all applicable intellectual
 * property laws, including trade secret and copyright laws.
 * Adobe permits you to use and modify this file
 * in accordance with the terms of the Adobe license agreement
 * accompanying it (see LICENSE_ADOBE_PS.txt).
 * If you have received this file from a source other than Adobe,
 * then your use, modification, or distribution of it
 * requires the prior written permission from Adobe.
 ******************************************************************************/

declare(strict_types=1);

namespace Core\AbstractStore\Model\Data\Request\StoreSearchCriteria;

use Magento\Framework\Api\SortOrder as BaseSortOrder;

class SortOrder extends BaseSortOrder
{
    public const LAT = 'lat';
    public const LONG = 'long';

    /**
     * Get Latitude
     *
     * @return float
     * @codeCoverageIgnore
     */
    public function getLat(): float
    {
        return (float)$this->_get(self::LAT);
    }

    /**
     * Set Latitude
     *
     * @param float $lat
     * @return self
     * @codeCoverageIgnore
     */
    public function setLat(float $lat): self
    {
        return $this->setData(SortOrder::LAT, $lat);
    }

    /**
     * Get Longitude
     *
     * @return float
     * @codeCoverageIgnore
     */
    public function getLong(): float
    {
        return (float)$this->_get(self::LONG);
    }

    /**
     * Set Longitude
     *
     * @param float $long
     * @return self
     * @codeCoverageIgnore
     */
    public function setLong(float $long): self
    {
        return $this->setData(SortOrder::LONG, $long);
    }
}
