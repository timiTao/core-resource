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
interface CollectionInterface
{
    /**
     * Delete resource from collection
     *
     * @param ResourceInterface $resource
     */
    public function delete(ResourceInterface $resource);

    /**
     * Check if collection contain this resource
     *
     * @param ResourceInterface $resource
     * @return boolean
     */
    public function has(ResourceInterface $resource);

    /**
     * Add if not exists
     *
     * @param ResourceInterface $resource
     */
    public function add(ResourceInterface $resource);

    /**
     * Add if not exists
     *
     * Overwrite if exists
     *
     * @param ResourceInterface $resource
     */
    public function set(ResourceInterface $resource);

    /**
     * Return ResourceInterface by index
     *
     * @param string $key
     * @return ResourceInterface
     */
    public function get($key);
}