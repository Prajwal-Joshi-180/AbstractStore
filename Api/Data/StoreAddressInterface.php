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
interface StoreAddressInterface extends ExtensibleDataInterface
{
    public const STREET_NUMBER = 'street_number';
    public const BUILDING = 'building';
    public const SOI = 'soi';
    public const STREET = 'street';
    public const DISTRICT = 'district';
    public const DISTRICT_ID = 'district_id';
    public const SUB_DISTRICT = 'sub_district';
    public const SUB_DISTRICT_ID = 'sub_district_id';
    public const REGION = 'region';
    public const REGION_ID = 'region_id';
    public const POST_CODE = 'post_code';
    public const CONTACT_NUMBER = 'contact_number';
    public const COUNTRY_CODE = 'country_code';
    public const CITY = 'city';
    public const LATITUDE = 'latitude';
    public const LONGITUDE = 'longitude';

    /**
     * Get street number
     *
     * @return string
     */
    public function getStreetNumber(): string;

    /**
     * Set street number
     *
     * @param string $value
     * @return $this
     */
    public function setStreetNumber(string $value): StoreAddressInterface;

    /**
     * Get building
     *
     * @return string
     */
    public function getBuilding(): string;

    /**
     * Set Building
     *
     * @param string $value
     * @return $this
     */
    public function setBuilding(string $value): StoreAddressInterface;

    /**
     * Get Soi
     *
     * @return string
     */
    public function getSoi(): string;

    /**
     * Set Soi
     *
     * @param string $value
     * @return $this
     */
    public function setSoi(string $value): StoreAddressInterface;

    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet(): string;

    /**
     * Set street
     *
     * @param string $value
     * @return $this
     */
    public function setStreet(string $value): StoreAddressInterface;

    /**
     * Get District
     *
     * @return string
     */
    public function getDistrict(): string;

    /**
     * Set District
     *
     * @param string $value
     * @return $this
     */
    public function setDistrict(string $value): StoreAddressInterface;

    /**
     * Get District Id
     *
     * @return int
     */
    public function getDistrictId(): int;

    /**
     * Set District ID
     *
     * @param int $value
     * @return $this
     */
    public function setDistrictId(int $value): StoreAddressInterface;

    /**
     * Get Sub District
     *
     * @return string
     */
    public function getSubDistrict(): string;

    /**
     * Set sub District
     *
     * @param string $value
     * @return $this
     */
    public function setSubDistrict(string $value): StoreAddressInterface;

    /**
     * Get Sub District ID
     *
     * @return int
     */
    public function getSubDistrictId(): int;

    /**
     * Set Sub District ID
     *
     * @param int $value
     * @return $this
     */
    public function setSubDistrictId(int $value): StoreAddressInterface;

    /**
     * Gr Region
     *
     * @return string
     */
    public function getRegion(): string;

    /**
     * Set Region
     *
     * @param string $value
     * @return $this
     */
    public function setRegion(string $value): StoreAddressInterface;

    /**
     * Get Region
     *
     * @return int
     */
    public function getRegionId(): int;

    /**
     * Set Region ID
     *
     * @param int $value
     * @return $this
     */
    public function setRegionId(int $value): StoreAddressInterface;

    /**
     * Get Post Code
     *
     * @return string
     */
    public function getPostCode(): string;

    /**
     * Set Post Code
     *
     * @param string $value
     * @return $this
     */
    public function setPostCode(string $value): StoreAddressInterface;

    /**
     * Get Contact NUmber
     *
     * @return string
     */
    public function getContactNumber(): string;

    /**
     * Set Contact Number
     *
     * @param string $value
     * @return $this
     */
    public function setContactNumber(string $value): StoreAddressInterface;

    /**
     * Get Country Code
     *
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * Set country Code
     *
     * @param string $value
     * @return $this
     */
    public function setCountryCode(string $value): StoreAddressInterface;

    /**
     * Set City
     *
     * @param string $value
     * @return $this
     */
    public function setCity(string $value): StoreAddressInterface;

    /**
     * Get City
     *
     * @return string
     */
    public function getCity(): string;

    /**
     * Set Latitude
     *
     * @param string $value
     * @return $this
     */
    public function setLatitude(string $value): StoreAddressInterface;

    /**
     * Get Latitude
     *
     * @return string
     */
    public function getLatitude(): string;

    /**
     * Set Longitude
     *
     * @param string $value
     * @return $this
     */
    public function setLongitude(string $value): StoreAddressInterface;

    /**
     * Get Longitude
     *
     * @return string
     */
    public function getLongitude(): string;

    /**
     * Set Extension Attribute
     *
     * @param StoreAddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Core\AbstractStore\Api\Data\StoreAddressExtensionInterface $extensionAttributes
    );

    /**
     * Get Extension Attribute
     *
     * @return \Core\AbstractStore\Api\Data\StoreAddressExtensionInterface
     */
    public function getExtensionAttributes();
}
