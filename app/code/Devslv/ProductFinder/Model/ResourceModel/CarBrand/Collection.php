<?php 

declare(strict_types=1);

namespace Devslv\ProductFinder\Model\ResourceModel\CarBrand;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Devslv\ProductFinder\Model\CarBrand;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(CarBrand::class, \Devslv\ProductFinder\Model\ResourceModel\CarBrand::class);
    }
}
