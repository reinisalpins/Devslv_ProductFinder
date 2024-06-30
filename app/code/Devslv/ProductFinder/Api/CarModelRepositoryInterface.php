<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api;

use Devslv\ProductFinder\Api\Data\CarModelInterface;
use Devslv\ProductFinder\Api\Data\CarModelSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface CarModelRepositoryInterface
{
    /**
     * @param int $id
     * @return CarModelInterface
     */
    public function get(int $id): CarModelInterface;

    /**
     * @param SearchCriteriaInterface $criteria
     * @return CarModelSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria): CarModelSearchResultsInterface;

    /**
     * @param CarModelInterface $entity
     * @return CarModelInterface
     */
    public function save(CarModelInterface $entity): CarModelInterface;

    /**
     * @param CarModelInterface $entity
     * @return bool
     */
    public function delete(CarModelInterface $entity): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;

    /**
     * @param int $id
     * @return CarModelSearchResultsInterface
     */
    public function getByCarBrandEntityId(int $id): CarModelSearchResultsInterface;
}
