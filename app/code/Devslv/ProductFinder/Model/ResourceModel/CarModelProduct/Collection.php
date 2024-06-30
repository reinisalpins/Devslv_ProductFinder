<?php 

declare(strict_types=1);

namespace Devslv\ProductFinder\Model\ResourceModel\CarModelProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Devslv\ProductFinder\Model\CarModelProduct;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(CarModelProduct::class, \Devslv\ProductFinder\Model\ResourceModel\CarModelProduct::class);
    }
}
