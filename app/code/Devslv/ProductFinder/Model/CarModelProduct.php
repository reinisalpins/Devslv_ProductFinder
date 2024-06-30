<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Devslv\ProductFinder\Api\Data\CarModelProductExtensionInterface;
use Devslv\ProductFinder\Api\Data\CarModelProductInterface;

class CarModelProduct extends AbstractExtensibleModel implements CarModelProductInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\CarModelProduct::class);
    }

    /**
     * Get catalog_product_entity_id
     * @return string|null
     */
    public function getCatalogProductEntityId(): ?string
    {
        return $this->getData(self::CATALOG_PRODUCT_ENTITY_ID);
    }

    /**
     * Set catalog_product_entity_id
     * @param string $catalog_product_entity_id
     * @return CarModelProductInterface
     */
    public function setCatalogProductEntityId(string $catalog_product_entity_id): CarModelProductInterface
    {
        return $this->setData(self::CATALOG_PRODUCT_ENTITY_ID, $catalog_product_entity_id);
    }

    /**
     * Get carmodel_entity_id
     * @return string|null
     */
    public function getCarmodelEntityId(): ?string
    {
        return $this->getData(self::CARMODEL_ENTITY_ID);
    }

    /**
     * Set carmodel_entity_id
     * @param string $carmodel_entity_id
     * @return CarModelProductInterface
     */
    public function setCarmodelEntityId(string $carmodel_entity_id): CarModelProductInterface
    {
        return $this->setData(self::CARMODEL_ENTITY_ID, $carmodel_entity_id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return CarModelProductExtensionInterface|null
     */
    public function getExtensionAttributes(): ?CarModelProductExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param CarModelProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        CarModelProductExtensionInterface $extensionAttributes
    ): static {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
