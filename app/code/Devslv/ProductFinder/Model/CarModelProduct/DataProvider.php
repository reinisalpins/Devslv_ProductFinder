<?php
namespace Devslv\ProductFinder\Model\CarModelProduct;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Devslv\ProductFinder\Model\ResourceModel\CarModelProduct\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData(): array
    {
        $data = parent::getData();

        $items = [];
        foreach ($data['items'] as $item) {
            $items[$item['entity_id']] = $item;
        }

        return $items;
    }
}
