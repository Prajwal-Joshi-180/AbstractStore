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

namespace Core\AbstractStore\Api;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Core\AbstractStore\Api\Data\Request\StoreSearchCriteriaInterface;
use Core\AbstractStore\Api\Data\StoreInterface;

interface StoreRepositoryInterface
{
    /**
     * Get by ID
     *
     * @param int $id
     * @return StoreInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): StoreInterface;

    /**
     * Get by Store code
     *
     * @param string $storeCode
     * @param string $storeView
     * @return StoreInterface
     * @throws NoSuchEntityException
     */
    public function getByStoreCode(string $storeCode, string $storeView): StoreInterface;

    /**
     * Get list by SearchCriteria
     *
     * @param StoreSearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(StoreSearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * Get all ISPU stores
     *
     * @return StoreInterface[]|null
     */
    public function getAllIspuStores(): ?array;
}
