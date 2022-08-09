<?php
namespace Core\AbstractStore\Test\Unit\Model\Store;

use Core\AbstractStore\Api\Data\StoreAddressInterface;
use Core\AbstractStore\Api\Data\StoreExtensionFactory;
use Core\AbstractStore\Api\Data\StoreExtensionInterface;
use Core\AbstractStore\Api\Data\StoreInterface;
use Core\AbstractStore\Model\Store\Calculator;
use Core\AbstractStore\Model\Store\Sorter;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Mockery;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;

class SorterTest extends TestCase
{
    /**
     * @var Calculator|\Mockery\Mock
     */
    protected $calculator;

    /**
     * @var StoreExtensionFactory|\Mockery\Mock
     */
    protected $storeExtensionFactory;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    protected function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }

    protected function setUp()
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);
        $this->calculator = Mockery::mock(Calculator::class);
        $this->storeExtensionFactory = Mockery::mock(StoreExtensionFactory::class);
    }

    /**
     * @dataProvider getTestSortByDistanceDataProvider
     * @param string $direction
     * @param int $sid1
     * @param int $sid2
     * @param int $sid3
     * @covers \Core\AbstractStore\Model\Store\Sorter::sortByDistance
     */
    public function testSortByDistance(string $direction, int $sid1, int $sid2, int $sid3)
    {
        $fromLat = 123.45;
        $fromLong = 678.90;

        $storeExtension = $this->getStoreExtensionAttributesMock();
        $storeExtension->shouldReceive('setDistance')->times(3);

        $address1 = $this->getStoreAddressInterfaceMock();
        $address1->shouldReceive('getLatitude')->once()->andReturnNull();

        $store1 = $this->getStoreInterfaceMock();
        $store1->shouldReceive('getAddress')->once()->andReturn($address1);
        $store1->shouldReceive('getExtensionAttributes')->once()->andReturnNull();
        $store1->shouldReceive('setExtensionAttributes')->once();
        $store1->shouldReceive('getId')->andReturn(1);

        $address2 = $this->getStoreAddressInterfaceMock();
        $address2->shouldReceive('getLatitude')->twice()->andReturn($fromLat + 1);
        $address2->shouldReceive('getLongitude')->twice()->andReturn($fromLong);

        $store2 = $this->getStoreInterfaceMock();
        $store2->shouldReceive('getAddress')->times(4)->andReturn($address2);
        $store2->shouldReceive('getExtensionAttributes')->once()->andReturnNull();
        $store2->shouldReceive('setExtensionAttributes')->once();
        $store2->shouldReceive('getId')->andReturn(2);

        $address3 = $this->getStoreAddressInterfaceMock();
        $address3->shouldReceive('getLatitude')->twice()->andReturn($fromLat + 2);
        $address3->shouldReceive('getLongitude')->twice()->andReturn($fromLong);

        $store3 = $this->getStoreInterfaceMock();
        $store3->shouldReceive('getAddress')->times(4)->andReturn($address3);
        $store3->shouldReceive('getExtensionAttributes')->once()->andReturnNull();
        $store3->shouldReceive('setExtensionAttributes')->once();
        $store3->shouldReceive('getId')->andReturn(3);

        $this->storeExtensionFactory->shouldReceive('create')->times(3)->andReturn($storeExtension);
        $this->calculator->shouldReceive('calculateHaversineCircleDistance')->andReturns(1, 2);

        $subjectUnderTest = $this->getSubjectUnderTest();
        $result = $subjectUnderTest->sortByDistance($fromLat, $fromLong, [$store1, $store2, $store3], $direction);

        $this->assertCount(3, $result);
        $this->assertEquals($sid1, $result[0]->getId());
        $this->assertEquals($sid2, $result[1]->getId());
        $this->assertEquals($sid3, $result[2]->getId());
    }

    /**
     * @return StoreInterface|\Mockery\Mock
     */
    public function getStoreInterfaceMock()
    {
        return \Mockery::mock(StoreInterface::class);
    }

    /**
     * @return StoreAddressInterface|\Mockery\Mock
     */
    public function getStoreAddressInterfaceMock()
    {
        return \Mockery::mock(StoreAddressInterface::class);
    }

    /**
     * @return StoreExtensionInterface|\Mockery\Mock
     */
    public function getStoreExtensionAttributesMock()
    {
        return \Mockery::mock(StoreExtensionInterface::class);
    }

    /**
     * @return object|Sorter
     */
    public function getSubjectUnderTest()
    {
        return $this->objectManager->getObject(Sorter::class, [
            'calculator' => $this->calculator,
            'storeExtensionFactory' => $this->storeExtensionFactory,
        ]);
    }

    /**
     * @return array
     */
    public function getTestSortByDistanceDataProvider()
    {
        return [
            'Sort ASC' => [
                'direction' => 'ASC',
                'sid1' => 2,
                'sid2' => 3,
                'sid3' => 1,
            ],
            'Sort DESC' => [
                'direction' => 'DESC',
                'sid1' => 3,
                'sid2' => 2,
                'sid3' => 1,
            ],
        ];
    }
}
