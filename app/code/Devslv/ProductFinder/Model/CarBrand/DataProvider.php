<?php

namespace Devslv\ProductFinder\Model\CarBrand;

use Devslv\ProductFinder\Model\ResourceModel\CarBrand\CollectionFactory;
use Devslv\ProductFinder\Model\ResourceModel\CarModel\CollectionFactory as CarModelCollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $carModelCollectionFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        CarModelCollectionFactory $carModelCollectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->carModelCollectionFactory = $carModelCollectionFactory;
    }

    public function getData(): array
    {
        $data = parent::getData();

        $items = [];
        foreach ($data['items'] as $item) {
            $carModels = $this->carModelCollectionFactory->create()
                ->addFieldToFilter('carbrand_entity_id', $item['entity_id'])
                ->getData();
            $item['carmodels'] = $carModels;

            $items[$item['entity_id']] = $item;
        }

        return $items;
    }
}
