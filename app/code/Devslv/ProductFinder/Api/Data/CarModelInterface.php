<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CarModelInterface extends ExtensibleDataInterface
{
    public const CARBRAND_ENTITY_ID = 'carbrand_entity_id';
    public const NAME = 'name';
    public const CODE = 'code';
    public const IMAGE_URL = 'image_url';

    /**
     * @return string|null
     */
    public function getCarbrandEntityId(): ?string;

    /**
     * @param string $carbrand_entity_id
     * @return \Devslv\ProductFinder\Api\Data\CarModelInterface
     */
    public function setCarbrandEntityId(string $carbrand_entity_id): \Devslv\ProductFinder\Api\Data\CarModelInterface;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     * @return \Devslv\ProductFinder\Api\Data\CarModelInterface
     */
    public function setName(string $name): \Devslv\ProductFinder\Api\Data\CarModelInterface;

    /**
     * @return string|null
     */
    public function getCode(): ?string;

    /**
     * @param string $code
     * @return \Devslv\ProductFinder\Api\Data\CarModelInterface
     */
    public function setCode(string $code): \Devslv\ProductFinder\Api\Data\CarModelInterface;

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string;

    /**
     * @param string $image_url
     * @return \Devslv\ProductFinder\Api\Data\CarModelInterface
     */
    public function setImageUrl(string $image_url): \Devslv\ProductFinder\Api\Data\CarModelInterface;

    /**
     * @return \Devslv\ProductFinder\Api\Data\CarModelExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\Devslv\ProductFinder\Api\Data\CarModelExtensionInterface;

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarModelExtensionInterface $extensionAttributes
     * @return static
     */
    public function setExtensionAttributes(
        \Devslv\ProductFinder\Api\Data\CarModelExtensionInterface $extensionAttributes
    ): static;
}
