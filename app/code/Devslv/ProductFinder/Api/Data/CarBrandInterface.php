<?php

declare(strict_types=1);

namespace Devslv\ProductFinder\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CarBrandInterface extends ExtensibleDataInterface
{
    public const NAME = 'name';
    public const CODE = 'code';
    public const IMAGE_URL = 'image_url';

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface
     */
    public function setName(string $name): \Devslv\ProductFinder\Api\Data\CarBrandInterface;

    /**
     * @return string|null
     */
    public function getCode(): ?string;

    /**
     * @param string $code
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface
     */
    public function setCode(string $code): \Devslv\ProductFinder\Api\Data\CarBrandInterface;

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string;

    /**
     * @param string $image_url
     * @return \Devslv\ProductFinder\Api\Data\CarBrandInterface
     */
    public function setImageUrl(string $image_url): \Devslv\ProductFinder\Api\Data\CarBrandInterface;

    /**
     * @return \Devslv\ProductFinder\Api\Data\CarBrandExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\Devslv\ProductFinder\Api\Data\CarBrandExtensionInterface;

    /**
     * @param \Devslv\ProductFinder\Api\Data\CarBrandExtensionInterface $extensionAttributes
     * @return static
     */
    public function setExtensionAttributes(
        \Devslv\ProductFinder\Api\Data\CarBrandExtensionInterface $extensionAttributes
    ): static;
}
