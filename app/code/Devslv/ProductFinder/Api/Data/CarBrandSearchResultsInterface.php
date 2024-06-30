<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CarBrandSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface[]
     */
    public function getItems();

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarBrandInterface[] $items
     */
    public function setItems(array $items);
}
