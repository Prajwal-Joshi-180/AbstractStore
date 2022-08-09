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

namespace Core\AbstractStore\Model\Data\Request;

use Magento\Framework\Api\SearchCriteria;
use Core\AbstractStore\Api\Data\Request\StoreSearchCriteriaInterface;
use Core\AbstractStore\Model\Data\Request\StoreSearchCriteria\SortOrder;

class StoreSearchCriteria extends SearchCriteria implements StoreSearchCriteriaInterface
{
    /**
     * Get Sort Order
     *
     * @return SortOrder[]
     * @codeCoverageIgnore
     */
    public function getSortOrders(): array
    {
        return $this->_get(self::SORT_ORDERS) === null ? [] : $this->_get(self::SORT_ORDERS);
    }

    /**
     * Set Sort Order
     *
     * @param SortOrder[] $items
     * @return $this
     * @codeCoverageIgnore
     */
    public function setSortOrders(array $items = null): StoreSearchCriteriaInterface
    {
        return $this->setData(self::SORT_ORDERS, $items);
    }
}
