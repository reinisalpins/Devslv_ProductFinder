<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Devslv\ProductFinder\Api\Data\CarBrandInterface;
use Devslv\ProductFinder\Api\Data\CarBrandInterfaceFactory;
use Devslv\ProductFinder\Api\Data\CarBrandSearchResultsInterface;
use Devslv\ProductFinder\Api\Data\CarBrandSearchResultsInterfaceFactory;
use Devslv\ProductFinder\Api\CarBrandRepositoryInterface;
use Devslv\ProductFinder\Model\ResourceModel\CarBrand as ResourceCarBrand;
use Devslv\ProductFinder\Model\ResourceModel\CarBrand\CollectionFactory as CarBrandCollectionFactory;

class CarBrandRepository implements CarBrandRepositoryInterface
{
    public function __construct(
        private readonly ResourceCarBrand $resource,
        private readonly CarBrandFactory $carBrandFactory,
        private readonly CarBrandCollectionFactory $carBrandCollectionFactory,
        private readonly CollectionProcessorInterface $collectionProcessor,
        private readonly CarBrandSearchResultsInterfaceFactory $searchResultsFactory,
        private readonly JoinProcessorInterface $extensionAttributesJoinProcessor
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function save(CarBrandInterface $entity): CarBrandInterface
    {
        try {
            $this->resource->save($entity);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the carBrand: %1',
                $exception->getMessage()
            ));
        }
        return $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $id): CarBrandInterface
    {
        $carBrand = $this->carBrandFactory->create();
        $this->resource->load($carBrand, $id);
        if (!$carBrand->getId()) {
            throw new NoSuchEntityException(__('CarBrand with id "%1" does not exist.', $id));
        }
        return $carBrand;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria): CarBrandSearchResultsInterface
    {
        $collection = $this->carBrandCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            CarBrandInterface::class
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
    public function delete(CarBrandInterface $entity): bool
    {
        try {
            $carBrandModel = $this->carBrandFactory->create();
            $this->resource->load($carBrandModel, $entity->getEntityId());
            $this->resource->delete($carBrandModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CarBrand: %1',
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
