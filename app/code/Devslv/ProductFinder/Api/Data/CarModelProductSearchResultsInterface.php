<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CarModelProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductInterface[]
     */
    public function getItems();

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarModelProductInterface[] $items
     */
    public function setItems(array $items);
}
