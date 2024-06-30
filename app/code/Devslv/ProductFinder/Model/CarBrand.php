<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Devslv\ProductFinder\Api\Data\CarBrandExtensionInterface;
use Devslv\ProductFinder\Api\Data\CarBrandInterface;

class CarBrand extends AbstractExtensibleModel implements CarBrandInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\CarBrand::class);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return CarBrandInterface
     */
    public function setName(string $name): CarBrandInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get code
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->getData(self::CODE);
    }

    /**
     * Set code
     * @param string $code
     * @return CarBrandInterface
     */
    public function setCode(string $code): CarBrandInterface
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Get image_url
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->getData(self::IMAGE_URL);
    }

    /**
     * Set image_url
     * @param string $image_url
     * @return CarBrandInterface
     */
    public function setImageUrl(string $image_url): CarBrandInterface
    {
        return $this->setData(self::IMAGE_URL, $image_url);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return CarBrandExtensionInterface|null
     */
    public function getExtensionAttributes(): ?CarBrandExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param CarBrandExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        CarBrandExtensionInterface $extensionAttributes
    ): static {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
