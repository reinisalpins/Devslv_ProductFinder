<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Devslv\ProductFinder\Api\Data\CarBrandInterface;
use Devslv\ProductFinder\Api\Data\CarBrandSearchResultsInterface;

interface CarBrandRepositoryInterface
{
    /**
     * @param int $id
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface
     */
    public function get(int $id): \Devslv\ProductFinder\Api\Data\CarBrandInterface;

    /**
      * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
      * @return \Devslv\ProductFinder\Api\Data\CarBrandSearchResultsInterface
      */
    public function getList(SearchCriteriaInterface $criteria): \Devslv\ProductFinder\Api\Data\CarBrandSearchResultsInterface;

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarBrandInterface $entity
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface
     */
    public function save(CarBrandInterface $entity): \Devslv\ProductFinder\Api\Data\CarBrandInterface;

    /**
      * @param \Devslv\ProductFinder\Api\Data\CarBrandInterface $entity
      * @return bool
      */
    public function delete(CarBrandInterface $entity): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
