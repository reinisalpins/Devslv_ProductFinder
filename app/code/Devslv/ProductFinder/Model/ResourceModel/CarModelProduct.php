<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CarModelProduct extends AbstractDb
{
    public const MAIN_TABLE = 'devslv_productfinder_carmodelproducts';

    public const ID_FIELD_NAME = 'catalog_product_entity_id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
