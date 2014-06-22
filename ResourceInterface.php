<?php
/**
 * User: Tom
 * Date: 22.06.2014
 */
namespace TimiTao\Core\Resource;


/**
 * Class Resource
 *
 * @package TimiTao\Core\Resource
 */
interface ResourceInterface
{
    /**
     * @return string
     */
    public function getResourceID();

    /**
     * @return string
     */
    public function getResourceType();
}