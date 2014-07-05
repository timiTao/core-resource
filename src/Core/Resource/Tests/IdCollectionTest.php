<?php
/**
 * User: Tom
 * Date: 25.06.2014
 */

namespace TimiTao\Core\Resource\Tests;

use TimiTao\Core\Resource\Collection\IdCollection;

/**
 * Class IdCollectionTest
 *
 * @package TimiTao\Core\Resource\Tests
 */
class IdCollectionTest extends \PHPUnit_Framework_TestCase
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
            $collection = new IdCollection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );

        //endregion


        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test2'),
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
            $collection = new IdCollection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 1
        );
        //endregion

        //region 3
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test'),
            $expectedCount = $collection->count() + 1
        );
        //endregion

        //region 4
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test2'),
            $expectedCount = $collection->count()
        );
        //endregion

        //region 4
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(1, 'test2'));
        $collection->add($this->generateResource(2, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(3, 'test2'),
            $expectedCount = $collection->count() + 1
        );
        //endregion

        //region 5
        $collection = new IdCollection();
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
            $collection = new IdCollection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedResult = false
        );
        //endregion

        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedResult = true
        );
        //endregion

        //region 3
        $collection = new IdCollection();
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
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test'));
        $collection->add($this->generateResource(1, 'test2'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(2, 'test2'),
            $expectedResult = true
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
            $collection = new IdCollection(),
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 0
        );
        //endregion

        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = 0
        );
        //endregion

        //region 3
        $collection = new IdCollection();
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

        //region 4
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test2'));
        $collection->add($this->generateResource(3, 'test'));
        $collection->add($this->generateResource(4, 'test'));


        $tests[] = array(
            $collection,
            $resource = $this->generateResource(1, 'test'),
            $expectedCount = $collection->count() - 1
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
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));

        $tests[] = array(
            $collection,
            $key = 1,
            $resource = $this->generateResource(1, 'test')
        );
        //endregion


        //region 2
        $collection = new IdCollection();
        $collection->add($this->generateResource(1, 'test'));
        $collection->add($this->generateResource(2, 'test2'));
        $collection->add($this->generateResource(3, 'test'));

        $tests[] = array(
            $collection,
            $key = 2,
            $resource = $this->generateResource(2, 'test2')
        );

        //endregion

        return $tests;
    }

}
 