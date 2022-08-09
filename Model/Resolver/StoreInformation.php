<?php

declare(strict_types=1);

namespace Core\AbstractStore\Model\Resolver;

use Core\AbstractStore\Api\Data\StoreInterface;
use Core\AbstractStore\Api\StoreRepositoryInterfaceFactory;
use Exception;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class StoreInformation implements ResolverInterface
{
    /**
     * @var StoreRepositoryInterfaceFactory
     */
    private StoreRepositoryInterfaceFactory $storeRepository;

    /**
     * @param StoreRepositoryInterfaceFactory $storeRepository
     */
    public function __construct(StoreRepositoryInterfaceFactory $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['store_id'])) {
            throw new GraphQlInputException(__('store_id is required'));
        }
        try {
            return $this->getStoreInfo((int)$args['store_id']);
        } catch (Exception $ex) {
            throw new GraphQlInputException(__($ex->getMessage()));
        }
    }

    /**
     * Get store Info as array
     *
     * @param int $store_id
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    private function getStoreInfo(int $store_id): array
    {
        $data = [];
        $storeInfo = $this->storeRepository->create()->get((int)$store_id);
        return $this->extractStoreData($storeInfo, $data);
    }

    /**
     * Extract data in to an array
     *
     * @param StoreInterface $storeInfo
     * @param array $data
     * @return array
     */
    private function extractStoreData(StoreInterface $storeInfo, array $data): array
    {
        foreach ($storeInfo->getData() as $index => $item) {
            if (in_array($index, ['address', 'extension_attributes'])) {
                continue;
            }
            $data[$index] = $item ?? "";
        }
        $data['address'] = $this->addAddressFields($storeInfo);
        $data['opening_hours'] = $this->addOpeningHours($storeInfo);
        $data['store_pickup'] = $this->addStorePickup($storeInfo);
        $data['allow_ship_from_store'] = $storeInfo->getExtensionAttributes()->getStoreDelivery()->getAllowShipFromStore();
        $data['image'] = $storeInfo->getExtensionAttributes()->getImage();
        $data['position'] = $storeInfo->getExtensionAttributes()->getPosition();
        $data['allow_pick_at_store'] = $storeInfo->getExtensionAttributes()->getAllowPickAtStore();
        $data['display_as_store_information'] = $storeInfo->getExtensionAttributes()->getDisplayAsStoreInformation();


        return $data;
    }

    /**
     * Get address fields
     *
     * @param StoreInterface $storeInfo
     * @return array
     */
    private function addAddressFields(StoreInterface $storeInfo): array
    {
        $address = [];
        foreach ($storeInfo->getAddress()->getData() as $index => $field) {
            $address[$index] = $field ?? "";
        }
        return $address;
    }

    /**
     * Get Store Opening Hours
     *
     * @param StoreInterface $storeInfo
     * @return array
     */
    private function addOpeningHours(StoreInterface $storeInfo): array
    {
        $openinghours = [];
        foreach ($storeInfo->getExtensionAttributes()->getOpeningHours() as $index => $field) {
            $openinghours[$index]['day'] = $field->getDay();
            $openinghours[$index]['open'] = $field->getOpen();
            $openinghours[$index]['close'] = $field->getClose();
        }
        return $openinghours;
    }

    /**
     * Get Store Opening Hours
     *
     * @param StoreInterface $storeInfo
     * @return array
     */
    private function addStorePickup(StoreInterface $storeInfo): array
    {
        $storepickup = [];
        $store_pickup = $storeInfo->getExtensionAttributes()->getStorePickup();

        $storepickup['store_id'] = $store_pickup->getStoreId();
        $storepickup['allow_ispu'] = $store_pickup->getAllowIspu();
        $storepickup['allow_sts'] = $store_pickup->getAllowSts();

        return $storepickup;
    }
}
