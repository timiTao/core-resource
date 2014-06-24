<?php
/**
 * User: Tom
 * Date: 22.06.2014
 */

namespace TimiTao\Core\Resource\Collection;

use TimiTao\Core\Resource\ResourceInterface;

/**
 * Class ResourceCollection
 *
 * @package TimiTao\Core\Resource\Collection
 */
class Collection extends \ArrayObject implements CollectionInterface
{

    /**
     * Add if resource not exists
     *
     * @param ResourceInterface $resource
     */
    public function add(ResourceInterface $resource)
    {
        $this->append($resource);
    }

    /**
     * Add if not exists
     *
     * Overwrite if exists
     *
     * @param ResourceInterface $resource
     */
    public function set(ResourceInterface $resource)
    {
        if (!$this->has($resource)) {
            $this->add($resource);

            return;
        }
        foreach ($this as $key => $listElement) {
            $sameID = $listElement->getResourceID() == $resource->getResourceID();
            $sameType = $listElement->getResourceType() == $resource->getResourceType();
            if ($sameID && $sameType) {
                $this->offsetSet($key, $resource);
            }
        }
    }

    /**
     * Check if collection contain this resource
     *
     * @param ResourceInterface $resource
     * @return bool
     */
    public function has(ResourceInterface $resource)
    {
        /** @var ResourceInterface $listElement */
        foreach ($this as $listElement) {
            $sameID = $listElement->getResourceID() == $resource->getResourceID();
            $sameType = $listElement->getResourceType() == $resource->getResourceType();
            if ($sameID && $sameType) {
                return true;
            }
        }

        return false;
    }

    /**
     * Delete resource from collection
     *
     * @param ResourceInterface $resource
     */
    public function delete(ResourceInterface $resource)
    {
        foreach ($this as $key => $listElement) {
            $sameID = $listElement->getResourceID() == $resource->getResourceID();
            $sameType = $listElement->getResourceType() == $resource->getResourceType();
            if ($sameID && $sameType) {
                $this->offsetUnset($key);
            }
        }
    }

    /**
     * Return ResourceInterface by index
     *
     * @param string $key
     * @return ResourceInterface
     */
    public function get($key)
    {
        return $this->offsetGet($key);
    }
} 