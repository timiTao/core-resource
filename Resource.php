<?php
/**
 * User: Tomasz Kunicki
 * Date: 22.06.2014
 */

namespace TimiTao\Core\Resource;

/**
 *
 * Base implementation of ResourceInterface
 *
 * Class Resource
 *
 * @package TimiTao\Core\Resource
 */
class Resource implements ResourceInterface
{
    /**
     * @var string
     */
    protected $resourceID;

    /**
     * @var string
     */
    protected $resourceType;

    /**
     * @param string $resourceID
     */
    public function setResourceID($resourceID)
    {
        $this->resourceID = $resourceID;
    }

    /**
     * @return string
     */
    public function getResourceID()
    {
        return $this->resourceID;
    }

    /**
     * @param string $resourceType
     */
    public function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;
    }

    /**
     * @return string
     */
    public function getResourceType()
    {
        return $this->resourceType;
    }
} 