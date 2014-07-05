<?php
/**
 * User: Tom
 * Date: 24.06.2014
 */


namespace TimiTao\Core\Resource\Tests;

use TimiTao\Core\Resource\Collection\Collection;
use TimiTao\Core\Resource\Tests\TraitBaseTestCollection;

/**
 * Class ResourceCollectionTest
 *
 * @package TimiTao\Core\Resource\Tests
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    use TraitBaseTestCollection;

    /**
     * @return array
     */
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
     * @return array
     */
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
     * @return array
     */
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
     * @return array
     */
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
     * @return array
     */
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
}
 