<?php
/**
 * User: Tom
 * Date: 22.06.2014
 */

namespace TimiTao\Core\Resource\Collection;

use TimiTao\Core\Resource\ResourceInterface;

/**
 * Class TypCollection
 *
 * Contain 1 type of resource
 *
 * @package TimiTao\Core\Resource\Collection
 */
class TypCollection extends \ArrayObject implements ResourceCollectionInterface
{

    /**
     * Add if resource not exists
     *
     * @param ResourceInterface $resource
     */
    public function add(ResourceInterface $resource)
    {
        if ($this->has($resource)) {
            return;
        }
        $this->offsetSet($resource->getResourceType(), $resource);
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
        }

        $this->offsetSet($resource->getResourceType(), $resource);
    }

    /**
     * Check if collection contain this resource
     *
     * @param ResourceInterface $resource
     * @return bool
     */
    public function has(ResourceInterface $resource)
    {
        return $this->offsetExists($resource->getResourceType());
    }

    /**
     * Delete resource from collection
     *
     * @param ResourceInterface $resource
     */
    public function delete(ResourceInterface $resource)
    {
        $this->offsetUnset($resource->getResourceType());
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