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
use Core\AbstractStore\Api\Data\StoreAddressExtensionInterface;
use Core\AbstractStore\Api\Data\StoreAddressInterface;

class StoreAddress extends AbstractExtensibleModel implements StoreAddressInterface
{
    /**
     * @inheritdoc
     */
    public function getStreetNumber(): string
    {
        return (string)$this->_getData(self::STREET_NUMBER);
    }

    /**
     * @inheritdoc
     */
    public function setStreetNumber(string $value): self
    {
        return $this->setData(self::STREET_NUMBER, $value);
    }

    /**
     * @inheritdoc
     */
    public function getBuilding(): string
    {
        return (string)$this->_getData(self::BUILDING);
    }

    /**
     * @inheritdoc
     */
    public function setBuilding(string $value): StoreAddressInterface
    {
        return $this->setData(self::BUILDING, $value);
    }

    /**
     * @inheritdoc
     */
    public function getSoi(): string
    {
        return (string)$this->_getData(self::SOI);
    }

    /**
     * @inheritdoc
     */
    public function setSoi(string $value): StoreAddressInterface
    {
        return $this->setData(self::SOI, $value);
    }

    /**
     * @inheritdoc
     */
    public function getStreet(): string
    {
        return (string)$this->_getData(self::STREET);
    }

    /**
     * @inheritdoc
     */
    public function setStreet(string $value): StoreAddressInterface
    {
        return $this->setData(self::STREET, $value);
    }

    /**
     * @inheritdoc
     */
    public function getDistrict(): string
    {
        return (string)$this->_getData(self::DISTRICT);
    }

    /**
     * @inheritdoc
     */
    public function setDistrict(string $value): self
    {
        return $this->setData(self::DISTRICT, $value);
    }

    /**
     * @inheritdoc
     */
    public function getDistrictId(): int
    {
        return (int)$this->_getData(self::DISTRICT_ID);
    }

    /**
     * @inheritdoc
     */
    public function setDistrictId(int $value): self
    {
        return $this->setData(self::DISTRICT_ID, $value);
    }

    /**
     * @inheritdoc
     */
    public function getSubDistrict(): string
    {
        return (string)$this->_getData(self::SUB_DISTRICT);
    }

    /**
     * @inheritdoc
     */
    public function setSubDistrict(string $value): self
    {
        return $this->setData(self::SUB_DISTRICT, $value);
    }

    /**
     * @inheritdoc
     */
    public function getSubDistrictId(): int
    {
        return (int)$this->_getData(self::SUB_DISTRICT_ID);
    }

    /**
     * @inheritdoc
     */
    public function setSubDistrictId(int $value): self
    {
        return $this->setData(self::SUB_DISTRICT_ID, $value);
    }

    /**
     * @inheritdoc
     */
    public function getRegion(): string
    {
        return (string)$this->_getData(self::REGION);
    }

    /**
     * @inheritdoc
     */
    public function setRegion(string $value): StoreAddressInterface
    {
        return $this->setData(self::REGION, $value);
    }

    /**
     * @inheritdoc
     */
    public function getRegionId(): int
    {
        return $this->_getData(self::REGION_ID);
    }

    /**
     * @inheritdoc
     */
    public function setRegionId(int $value): StoreAddressInterface
    {
        return $this->setData(self::REGION_ID, $value);
    }

    /**
     * @inheritdoc
     */
    public function getPostCode(): string
    {
        return (string)$this->_getData(self::POST_CODE);
    }

    /**
     * @inheritdoc
     */
    public function setPostCode(string $value): StoreAddressInterface
    {
        return $this->setData(self::POST_CODE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getContactNumber(): string
    {
        return (string)$this->_getData(self::CONTACT_NUMBER);
    }

    /**
     * @inheritdoc
     */
    public function setContactNumber(string $value): StoreAddressInterface
    {
        return $this->setData(self::CONTACT_NUMBER, $value);
    }

    /**
     * @inheritdoc
     */
    public function getCountryCode(): string
    {
        return (string)$this->_getData(self::COUNTRY_CODE);
    }

    /**
     * @inheritdoc
     */
    public function setCountryCode(string $value): self
    {
        return $this->setData(self::COUNTRY_CODE, $value);
    }

    /**
     * @inheritdoc
     */
    public function setCity(string $value): self
    {
        return $this->setData(self::CITY, $value);
    }

    /**
     * @inheritdoc
     */
    public function getCity(): string
    {
        return (string)$this->_getData(self::CITY);
    }

    /**
     * @inheritdoc
     */
    public function setLatitude(string $value): StoreAddressInterface
    {
        return $this->setData(self::LATITUDE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getLatitude(): string
    {
        return (string)$this->getData(self::LATITUDE);
    }

    /**
     * @inheritdoc
     */
    public function setLongitude(string $value): StoreAddressInterface
    {
        return $this->setData(self::LONGITUDE, $value);
    }

    /**
     * @inheritdoc
     */
    public function getLongitude(): string
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        StoreAddressExtensionInterface $extensionAttributes
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
