<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CarModelProductInterface extends ExtensibleDataInterface
{
    public const CATALOG_PRODUCT_ENTITY_ID = 'catalog_product_entity_id';
    public const CARMODEL_ENTITY_ID = 'carmodel_entity_id';

    /**
     * @return string|null
     */
    public function getCatalogProductEntityId(): ?string;

    /**
     * @param string $catalog_product_entity_id
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductInterface
     */
    public function setCatalogProductEntityId(string $catalog_product_entity_id): \Devslv\ProductFinder\Api\Data\CarModelProductInterface;

    /**
     * @return string|null
     */
    public function getCarmodelEntityId(): ?string;

    /**
     * @param string $carmodel_entity_id
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductInterface
     */
    public function setCarmodelEntityId(string $carmodel_entity_id): \Devslv\ProductFinder\Api\Data\CarModelProductInterface;

    /**
     * @return \Devslv\ProductFinder\Api\Data\CarModelProductExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\Devslv\ProductFinder\Api\Data\CarModelProductExtensionInterface;

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarModelProductExtensionInterface $extensionAttributes
     * @return static
     */
    public function setExtensionAttributes(
        \Devslv\ProductFinder\Api\Data\CarModelProductExtensionInterface $extensionAttributes
    ): static;
}
