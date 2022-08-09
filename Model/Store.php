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

namespace Core\AbstractStore\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Core\AbstractStore\Api\Data\StoreInterface;

class Store extends AbstractExtensibleModel implements StoreInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): ?int
    {
        return (int)$this->_getData(self::ID) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setId($value): self
    {
        return $this->setData(self::ID, $value);
    }

    /**
     * @inheritdoc
     */
    public function getName(): ?string
    {
        return (string)$this->_getData(self::NAME) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setName(string $value): self
    {
        return $this->setData(self::NAME, $value);
    }

    /**
     * @inheritdoc
     */
    public function getStoreCode(): ?string
    {
        return (string)$this->_getData(self::STORE_CODE) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setStoreCode(string $value): self
    {
        return $this->setData(self::STORE_CODE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getUrlKey(): ?string
    {
        return (string)$this->_getData(self::URL_KEY) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setUrlKey(string $value): self
    {
        return $this->setData(self::URL_KEY, $value);
    }

    /**
     * @inheritdoc
     */
    public function getStoreTypeName(): ?string
    {
        return (string)$this->_getData(self::STORE_TYPE_NAME) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setStoreTypeName(string $value): self
    {
        return $this->setData(self::STORE_TYPE_NAME, $value);
    }

    /**
     * @inheritdoc
     */
    public function getStoreType(): int
    {
        return (int)$this->_getData(self::STORE_TYPE);
    }

    /**
     * @inheritdoc
     */
    public function setStoreType($value): self
    {
        return $this->setData(self::STORE_TYPE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getIsActive(): ?bool
    {
        return (bool)$this->_getData(self::IS_ACTIVE) ?? null;
    }

    /**
     * @inheritdoc
     */
    public function setIsActive(bool $value): self
    {
        return $this->setData(self::IS_ACTIVE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getAddress()
    {
        return $this->_getData(self::ADDRESS);
    }

    /**
     * @inheritdoc
     */
    public function setAddress($value)
    {
        return $this->setData(self::ADDRESS, $value);
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        \Core\AbstractStore\Api\Data\StoreExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
}
