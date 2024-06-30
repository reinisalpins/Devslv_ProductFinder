<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Controller\Adminhtml\CarBrand;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Devslv_ProductFinder::CarBrand_save';

    public function __construct(
        Context $context,
        private readonly PageFactory $pageFactory
    ) {
        parent::__construct($context);
    }

    public function execute(): Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Devslv_ProductFinder::CarBrand');
        $page->getConfig()->getTitle()->prepend(__('Edit Car Brand'));

        return $page;
    }
}
