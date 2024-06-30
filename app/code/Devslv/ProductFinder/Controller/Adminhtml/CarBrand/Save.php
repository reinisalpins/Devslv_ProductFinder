<?php
declare(strict_types=1);

namespace Devslv\ProductFinder\Controller\Adminhtml\CarBrand;

use Devslv\ProductFinder\Api\CarBrandRepositoryInterface;
use Devslv\ProductFinder\Api\CarModelRepositoryInterface;
use Devslv\ProductFinder\Api\Data\CarBrandInterface;
use Devslv\ProductFinder\Model\CarBrandFactory;
use Devslv\ProductFinder\Model\CarModelFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Psr\Log\LoggerInterface;

class Save implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Devslv_ProductFinder::CarBrand_save';

    public function __construct(
        private readonly RequestInterface            $request,
        private readonly ManagerInterface            $messageManager,
        private readonly RedirectFactory             $resultRedirectFactory,
        private readonly CarBrandRepositoryInterface $repository,
        private readonly CarBrandFactory             $modelFactory,
        private readonly CarModelRepositoryInterface $carModelRepository,
        private readonly CarModelFactory             $carModelFactory,
        private readonly LoggerInterface             $logger
    )
    {
    }

    public function execute(): \Magento\Framework\Controller\Result\Redirect
    {
        $id = $this->request->getParam('entity_id');
        $data = $this->request->getPostValue();
        $model = $this->modelFactory->create();

        if ($id) {
            $model = $this->repository->get((int)$id);
        }

        $model->setData($data);

        try {
            $model = $this->repository->save($model);

            $this->saveOrUpdateCarModels($model, $data['carmodels'] ?? []);

            $this->messageManager->addSuccessMessage(__('You saved the item.'));
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->messageManager->addErrorMessage(__('There was an error saving the item.'));

            return $this->resultRedirectFactory->create()->setPath('*');
        }

        return $this->resultRedirectFactory->create()
            ->setPath('*/*/edit', ['entity_id' => $model->getId()]);
    }

    private function saveOrUpdateCarModels(CarBrandInterface $carBrand, array $carModels): void
    {
        $brandId = (int)$carBrand->getEntityId();
        $brandModels = $this->carModelRepository->getByCarBrandEntityId($brandId)->getItems();

        foreach ($carModels as $carModel) {
            if (!array_key_exists('entity_id', $carModel)) {
                $carModel['carbrand_entity_id'] = $brandId;
                $this->createCarModel($carModel);
            } else {
                $this->updateCarModel($carModel);
            }
        }

        $this->checkDeletedCarModels(
            existingCarModels: $brandModels,
            requestCarModels: $carModels
        );
    }

    private function updateCarModel(array $carModelPostData): void
    {
        $carModel = $this->carModelRepository->get((int)$carModelPostData['entity_id']);
        $carModel->setData($carModelPostData);

        $this->carModelRepository->save($carModel);
    }

    private function createCarModel(array $carModel): void
    {
        $carModelInstance = $this->carModelFactory->create();

        $carModelInstance->setData($carModel);
        $this->carModelRepository->save($carModelInstance);
    }

    private function checkDeletedCarModels(array $existingCarModels, array $requestCarModels): void
    {
        $existingIds = array_map(static fn($carModel) => $carModel->getEntityId(), $existingCarModels);
        $requestIds = array_filter(array_map(static fn($carModel) => $carModel['entity_id'] ?? null, $requestCarModels));

        $deletedIds = array_diff($existingIds, $requestIds);

        foreach ($deletedIds as $id) {
            $this->carModelRepository->deleteById((int)$id);
        }
    }
}
