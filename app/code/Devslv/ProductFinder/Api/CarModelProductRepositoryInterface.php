<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Devslv\ProductFinder\Api\Data\CarModelProductInterface;
use Devslv\ProductFinder\Api\Data\CarModelProductSearchResultsInterface;

interface CarModelProductRepositoryInterface
{
    /**
     * @param int $id
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductInterface
     */
    public function get(int $id): \Devslv\ProductFinder\Api\Data\CarModelProductInterface;

    /**
      * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
      * @return \Devslv\ProductFinder\Api\Data\CarModelProductSearchResultsInterface
      */
    public function getList(SearchCriteriaInterface $criteria): \Devslv\ProductFinder\Api\Data\CarModelProductSearchResultsInterface;

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarModelProductInterface $entity
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductInterface
     */
    public function save(CarModelProductInterface $entity): \Devslv\ProductFinder\Api\Data\CarModelProductInterface;

    /**
      * @param \Devslv\ProductFinder\Api\Data\CarModelProductInterface $entity
      * @return bool
      */
    public function delete(CarModelProductInterface $entity): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
