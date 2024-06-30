<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CarModelSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Devslv\ProductFinder\Api\Data\CarModelInterface[]
     */
    public function getItems();

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarModelInterface[] $items
     */
    public function setItems(array $items);
}
