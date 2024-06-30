<?php
namespace Devslv\ProductFinder\Block\Adminhtml\CarBrand\Edit;

use Magento\Backend\Block\Widget\Context;
use Devslv\ProductFinder\Api\CarBrandRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var CarBrandRepositoryInterface
     */
    protected $repository;

    /**
     * @param Context $context
     * @param CarBrandRepositoryInterface $repository
     */
    public function __construct(
        Context $context,
        CarBrandRepositoryInterface $repository
    ) {
        $this->context = $context;
        $this->repository = $repository;
    }

    public function getId(): ?int
    {
        $id = $this->context->getRequest()->getParam('entity_id');
        if (!$id) {
            return null;
        }

        try {
            return $this->repository->get($id)->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
