<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Devslv\ProductFinder\Api\CarModelRepositoryInterface;
use Devslv\ProductFinder\Api\Data\CarModelInterface;
use Devslv\ProductFinder\Api\Data\CarModelInterfaceFactory;
use Devslv\ProductFinder\Api\Data\CarModelSearchResultsInterface;
use Devslv\ProductFinder\Api\Data\CarModelSearchResultsInterfaceFactory;
use Devslv\ProductFinder\Model\ResourceModel\CarModel as ResourceCarModel;
use Devslv\ProductFinder\Model\ResourceModel\CarModel\CollectionFactory as CarModelCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CarModelRepository implements CarModelRepositoryInterface
{
    public function __construct(
        private readonly ResourceCarModel                      $resource,
        private readonly CarModelFactory                       $carModelFactory,
        private readonly CarModelCollectionFactory             $carModelCollectionFactory,
        private readonly CollectionProcessorInterface          $collectionProcessor,
        private readonly CarModelSearchResultsInterfaceFactory $searchResultsFactory,
        private readonly JoinProcessorInterface                $extensionAttributesJoinProcessor,
        private readonly SearchCriteriaBuilder $searchCriteriaBuilder,
    )
    {
    }

    /**
     * {@inheritdoc}
     */
    public function save(CarModelInterface $entity): CarModelInterface
    {
        try {
            $this->resource->save($entity);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the carModel: %1',
                $exception->getMessage()
            ));
        }
        return $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $id): CarModelInterface
    {
        $carModel = $this->carModelFactory->create();
        $this->resource->load($carModel, $id);
        if (!$carModel->getId()) {
            throw new NoSuchEntityException(__('CarModel with id "%1" does not exist.', $id));
        }
        return $carModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria): CarModelSearchResultsInterface
    {
        $collection = $this->carModelCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            CarModelInterface::class
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
    public function delete(CarModelInterface $entity): bool
    {
        try {
            $carModelModel = $this->carModelFactory->create();
            $this->resource->load($carModelModel, $entity->getEntityId());
            $this->resource->delete($carModelModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CarModel: %1',
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

    public function getByCarBrandEntityId(int $id): CarModelSearchResultsInterface
    {
        $this->searchCriteriaBuilder->addFilter('carbrand_entity_id',$id);
        $searchCriteria = $this->searchCriteriaBuilder->create();

        return $this->getList($searchCriteria);
    }
}
