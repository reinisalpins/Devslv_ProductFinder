<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Controller\Adminhtml\CarBrand;

use Devslv\ProductFinder\Model\CarBrand;
use Devslv\ProductFinder\Model\CarBrandFactory;
use Devslv\ProductFinder\Model\ResourceModel\CarBrand as ModelResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action implements HttpPostActionInterface
{
    public const ADMIN_RESOURCE = 'Devslv_ProductFinder::CarBrand_delete';

    private CarBrandFactory $modelFactory;
    private ModelResource $modelResource;

    public function __construct(
        Context $context,
        CarBrandFactory $modelFactory,
        ModelResource $modelResource
    ) {
        parent::__construct($context);

        $this->modelFactory = $modelFactory;
        $this->modelResource = $modelResource;
    }

    /** @thows \Exception */
    public function execute(): Redirect
    {
        try {
            $id = $this->getRequest()->getParam('entity_id');
            /** @var CarBrand $model */
            $model = $this->modelFactory->create();
            $this->modelResource->load($model, $id);
            if ($model->getId()) {
                $this->modelResource->delete($model);
                $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
            } else {
                $this->messageManager->addErrorMessage(__('The record does not exist.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        /** @var Redirect $redirect */
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $redirect->setPath('*/*');
    }
}
