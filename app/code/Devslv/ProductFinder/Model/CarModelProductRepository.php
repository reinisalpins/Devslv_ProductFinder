<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Devslv\ProductFinder\Api\Data\CarModelProductInterface;
use Devslv\ProductFinder\Api\Data\CarModelProductInterfaceFactory;
use Devslv\ProductFinder\Api\Data\CarModelProductSearchResultsInterface;
use Devslv\ProductFinder\Api\Data\CarModelProductSearchResultsInterfaceFactory;
use Devslv\ProductFinder\Api\CarModelProductRepositoryInterface;
use Devslv\ProductFinder\Model\ResourceModel\CarModelProduct as ResourceCarModelProduct;
use Devslv\ProductFinder\Model\ResourceModel\CarModelProduct\CollectionFactory as CarModelProductCollectionFactory;

class CarModelProductRepository implements CarModelProductRepositoryInterface
{
    public function __construct(
        private readonly ResourceCarModelProduct $resource,
        private readonly CarModelProductFactory $carModelProductFactory,
        private readonly CarModelProductCollectionFactory $carModelProductCollectionFactory,
        private readonly CollectionProcessorInterface $collectionProcessor,
        private readonly CarModelProductSearchResultsInterfaceFactory $searchResultsFactory,
        private readonly JoinProcessorInterface $extensionAttributesJoinProcessor
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function save(CarModelProductInterface $entity): CarModelProductInterface
    {
        try {
            $this->resource->save($entity);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the carModelProduct: %1',
                $exception->getMessage()
            ));
        }
        return $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $id): CarModelProductInterface
    {
        $carModelProduct = $this->carModelProductFactory->create();
        $this->resource->load($carModelProduct, $id);
        if (!$carModelProduct->getId()) {
            throw new NoSuchEntityException(__('CarModelProduct with id "%1" does not exist.', $id));
        }
        return $carModelProduct;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria): CarModelProductSearchResultsInterface
    {
        $collection = $this->carModelProductCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            CarModelProductInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(CarModelProductInterface $entity): bool
    {
        try {
            $carModelProductModel = $this->carModelProductFactory->create();
            $this->resource->load($carModelProductModel, $entity->getEntityId());
            $this->resource->delete($carModelProductModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CarModelProduct: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }
}
