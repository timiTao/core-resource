<?php
/**
 * User: Tom
 * Date: 24.06.2014
 */


namespace TimiTao\Core\Resource\Tests;

use TimiTao\Core\Resource\Collection\Collection;

/**
 * Class ResourceCollectionTest
 *
 * @package TimiTao\Core\Resource\Tests
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
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

    public function providerTestAdd()
    {
        $tests = array();

        //region 1
        $tests[] = array(
            $collection = new Collection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 2
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 2
        );

        //endregion

        return $tests;
    }

    /**
     * Test add method
     *
     * @dataProvider providerTestAdd
     *
     * @param Collection $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testAdd($collection, $resource, $expectedCount)
    {
        $collection->add($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }

    public function providerTestSet()
    {
        $tests = array();

        //region 1
        $tests[] = array(
            $collection = new Collection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 2
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 3
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test'),
            $expectedCount = $collection->count() + 1
        );
        //endregion

        //region 4
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test2'),
            $expectedCount = $collection->count() + 1
        );
        //endregion

        //region 4
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test2'));
        $collection->add($this->generateResource(2, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test2'),
            $expectedCount = $collection->count() + 1
        );
        //endregion

        //region 5
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test2'));
        $collection->add($this->generateResource(2, 'test'));
        $collection->add($this->generateResource(2, 'test2'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test2'),
            $expectedCount = $collection->count()
        );

        //endregion

        return $tests;
    }

    /**
     * Test set method
     *
     * @dataProvider providerTestSet
     *
     * @param Collection $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testSet(Collection $collection, $resource, $expectedCount)
    {
        $collection->set($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }

    public function providerTestHas()
    {
        $tests = array();

        //region 1
        $tests[] = array(
            $collection = new Collection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedResult = false
        );
        //endregion

        //region 2
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedResult = true
        );
        //endregion

        //region 3
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test'));
        $collection->add($this->generateResource(1, 'test2'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test'),
            $expectedResult = true
        );
        //endregion

        //region 4
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test'));
        $collection->add($this->generateResource(1, 'test2'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test2'),
            $expectedResult = false
        );

        //endregion

        return $tests;
    }


    /**
     * @dataProvider providerTestHas
     *
     * @param Collection $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param boolean $expectedResult
     */
    public function testHas($collection, $resource, $expectedResult)
    {
        $hasResource = $collection->has($resource);
        $this->assertEquals($expectedResult, $hasResource);
    }

    public function providerTestDelete()
    {
        $tests = array();

        //region 1
        $tests[] = array(
            $collection = new Collection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 0
        );
        //endregion

        //region 2
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 0
        );
        //endregion

        //region 3
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test2'));
        $collection->add($this->generateResource(2, 'test2'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test2'),
            $expectedCount = $collection->count() - 1
        );
        //endregion

        //region 3
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test2'));
        $collection->add($this->generateResource(2, 'test2'));
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = $collection->count() - 3
        );

        //endregion

        return $tests;
    }

    /**
     * @dataProvider providerTestDelete
     *
     * @param Collection $collection
     * @param \TimiTao\Core\Resource\ResourceInterface $resource
     * @param integer $expectedCount
     */
    public function testDelete($collection, $resource, $expectedCount)
    {
        $collection->delete($resource);
        $this->assertEquals($expectedCount, $collection->count());
    }

    public function providerTestGet()
    {
        $tests = array();

        //region 1
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $key = 0,
            $resource = $this->generateResource(1, 'test')
        );
        //endregion


        //region 2
        $collection = new Collection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test2'));
        $collection->add($this->generateResource(3, 'test'));

        $tests[] = array(
            $collection,
            $key = 1,
            $resource = $this->generateResource(2, 'test2')
        );
        //endregion

        return $tests;
    }

    /**
     * @dataProvider providerTestGet
     *
     * @param Collection $collection
     * @param $key
     * @param \TimiTao\Core\Resource\ResourceInterface $expectedResource
     */
    public function testGet($collection, $key, $expectedResource)
    {
        $resource = $collection->get($key);

        $this->assertEquals($expectedResource->getResourceID(), $resource->getResourceID());
        $this->assertEquals($expectedResource->getResourceType(), $resource->getResourceType());
    }
}
 