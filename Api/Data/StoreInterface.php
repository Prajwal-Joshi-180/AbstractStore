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

namespace Core\AbstractStore\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * @api
 */
interface StoreInterface extends ExtensibleDataInterface
{
    /**
     * Constants defined for keys of data array
     */
    public const ID = 'id';
    public const NAME = 'name';
    public const STORE_CODE = 'store_code';
    public const STORE_TYPE = 'store_type';
    public const IS_ACTIVE = 'is_active';
    public const ADDRESS = 'address';
    public const URL_KEY = 'url_key';
    public const STORE_TYPE_NAME = 'store_type_name';

    /**
     * Get store id
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Set store id
     *
     * @param int $value
     * @return $this
     */
    public function setId(int $value): StoreInterface;

    /**
     * Get store name
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set store name
     *
     * @param string $value
     * @return $this
     */
    public function setName(string $value): StoreInterface;

    /**
     * Get store code
     *
     * @return string|null
     */
    public function getStoreCode(): ?string;

    /**
     * Set store code
     *
     * @param string $value
     * @return $this
     */
    public function setStoreCode(string $value): StoreInterface;

    /**
     * Get store URL Key
     *
     * @return string|null
     */
    public function getUrlKey(): ?string;

    /**
     * Set store URL Key
     *
     * @param string $value
     * @return $this
     */
    public function setUrlKey(string $value): StoreInterface;

    /**
     * Get store type name
     *
     * @return string|null
     */
    public function getStoreTypeName(): ?string;

    /**
     * Set store type name
     *
     * @param string $value
     * @return $this
     */
    public function setStoreTypeName(string $value): StoreInterface;

    /**
     * Get store type
     *
     * @return int
     */
    public function getStoreType(): int;

    /**
     * Set store type
     *
     * @param String $value
     * @return $this
     */
    public function setStoreType($value): StoreInterface;

    /**
     * Get is active
     *
     * @return bool|null
     */
    public function getIsActive(): ?bool;

    /**
     * Set is active
     *
     * @param bool $value
     * @return $this
     */
    public function setIsActive(bool $value): StoreInterface;

    /**
     * Get Address
     *
     * @return \Core\AbstractStore\Api\Data\StoreAddressInterface
     */
    public function getAddress();

    /**
     * Set Address
     *
     * @param \Core\AbstractStore\Api\Data\StoreAddressInterface $value
     * @return $this
     */
    public function setAddress($value);

    /**
     * Set Extension Attribute
     *
     * @param \Core\AbstractStore\Api\Data\StoreExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Core\AbstractStore\Api\Data\StoreExtensionInterface $extensionAttributes
    );

    /**
     * Get Extension attribute
     *
     * @return \Core\AbstractStore\Api\Data\StoreExtensionInterface
     */
    public function getExtensionAttributes();
}
