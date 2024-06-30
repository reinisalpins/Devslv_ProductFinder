<?php 

declare(strict_types=1);

namespace Devslv\ProductFinder\Model\ResourceModel\CarModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Devslv\ProductFinder\Model\CarModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(CarModel::class, \Devslv\ProductFinder\Model\ResourceModel\CarModel::class);
    }
}
