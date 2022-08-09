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

namespace Core\AbstractStore\Model\Store;

use Core\AbstractStore\Api\Data\StoreExtensionFactory;
use Core\AbstractStore\Api\Data\StoreInterface;
use Core\AbstractStore\Model\Data\Request\StoreSearchCriteria\SortOrder;

class Sorter
{
    public const STORE = 'store';
    public const DISTANCE = 'distance';
    public const DISTANCE_TYPE = 'km';

    /**
     * @var string
     */
    protected string $direction;

    /**
     * @var Calculator
     */
    protected Calculator $calculator;

    /**
     * @var StoreExtensionFactory
     */
    protected $storeExtensionFactory;

    /**
     * @param Calculator $calculator
     * @param StoreExtensionFactory $storeExtensionFactory
     */
    public function __construct(
        Calculator $calculator,
        StoreExtensionFactory $storeExtensionFactory
    ) {
        $this->calculator = $calculator;
        $this->storeExtensionFactory = $storeExtensionFactory;
    }

    /**
     * Sort By distance
     *
     * @param float $fromLat
     * @param float $fromLong
     * @param StoreInterface[] $stores
     * @param string $direction
     * @return StoreInterface[]
     */
    public function sortByDistance(float $fromLat, float $fromLong, array $stores, string $direction): array
    {
        $sortArr = [];
        foreach ($stores as $store) {
            if (!$store->getAddress()->getLatitude() || !$store->getAddress()->getLongitude()) {
                $kmDistance = null;
            } else {
                $kmDistance = $this->calculator->calculateHaversineCircleDistance(
                    $fromLat,
                    $fromLong,
                    (float)$store->getAddress()->getLatitude(),
                    (float)$store->getAddress()->getLongitude()
                );
                $kmDistance = round($kmDistance * 100) / 100;
            }

            $storeExtension = $store->getExtensionAttributes() ?? $this->storeExtensionFactory->create();
            $storeExtension->setDistance($kmDistance);
            $store->setExtensionAttributes($storeExtension);

            $item = [
                self::DISTANCE => $kmDistance,
                self::STORE => $store
            ];

            $sortArr[] = $item;
        }

        $this->direction = $direction;
        usort($sortArr, [$this, 'sortArrByDistance']);

        return array_column($sortArr, self::STORE);
    }

    /**
     * Sort Array By distance
     *
     * @param array $a
     * @param array $b
     * @return float
     * @codeCoverageIgnore
     */
    protected function sortArrByDistance(array $a, array $b): float
    {
        if (($a[self::DISTANCE]) === null) {
            return 1;
        }
        if (($b[self::DISTANCE]) === null) {
            return -1;
        }
        if ($this->direction == SortOrder::SORT_DESC) {
            return $b[self::DISTANCE] - $a[self::DISTANCE];
        }
        return $a[self::DISTANCE] - $b[self::DISTANCE];
    }
}
