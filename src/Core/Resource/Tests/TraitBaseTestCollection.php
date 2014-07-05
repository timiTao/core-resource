<?php
/**
 * User: Tom
 * Date: 25.06.2014
 */

namespace TimiTao\Core\Resource\Tests;


use TimiTao\Core\Resource\Collection\CollectionInterface;

/**
 * Class TraitBaseTestCollectionInterface
 *
 * Trait holding base test for all type of collections
 *
 * @package TimiTao\Core\Resource\Tests
 */
trait TraitBaseTestCollection
{
    /**
     * @param int $id
     * @param string $type
     * @return \TimiTao\Core\Resource\ResourceInterface
     */
    private function generateResource($id = 1, $type = 'test')
    {
        /** @var \TimiTao\Core\Resource\ResourceInterface $stub */
        $stub = $this->getMock('TimiTao\Core\Resource\ResourceInterface');
        $stub->expects($this->any())
            ->method('getResourceID')
            ->will($this->returnValue($id));

        $stub->expects($this->any())
            ->method('getResourceType')
            ->will($this->returnValue($type));

        return $stub;
    }

    /**
     * Test add method
     *
     * @dataProvider providerTestAdd
     *
     * @param CollectionInterface $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testAdd(CollectionInterface $collection, $resource, $expectedCount)
    {
        $collection->add($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }


    /**
     * Test set method
     *
     * @dataProvider providerTestSet
     *
     * @param CollectionInterface $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testSet(CollectionInterface $collection, $resource, $expectedCount)
    {
        $collection->set($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }

    /**
     * @dataProvider providerTestHas
     *
     * @param CollectionInterface $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param boolean $expectedResult
     */
    public function testHas(CollectionInterface $collection, $resource, $expectedResult)
    {
        $hasResource = $collection->has($resource);
        $this->assertEquals($expectedResult, $hasResource);
    }

    /**
     * @dataProvider providerTestDelete
     *
     * @param CollectionInterface $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testDelete(CollectionInterface $collection, $resource, $expectedCount)
    {
        $collection->delete($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }

    /**
     * @dataProvider providerTestGet
     *
     * @param CollectionInterface $collection
     * @param $key
     * @param \TimiTao\Core\Resource\ResourceInterface $expectedResource
     */
    public function testGet(CollectionInterface $collection, $key, $expectedResource)
    {
        $resource = $collection->get($key);

        $this->assertEquals($expectedResource->getResourceID(), $resource->getResourceID());
        $this->assertEquals($expectedResource->getResourceType(), $resource->getResourceType());
    }
} 