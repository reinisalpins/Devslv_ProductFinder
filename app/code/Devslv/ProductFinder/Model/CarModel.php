<?php declare(strict_types=1);

namespace Devslv\ProductFinder\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Devslv\ProductFinder\Api\Data\CarModelExtensionInterface;
use Devslv\ProductFinder\Api\Data\CarModelInterface;

class CarModel extends AbstractExtensibleModel implements CarModelInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\CarModel::class);
    }

    /**
     * Get carbrand_entity_id
     * @return string|null
     */
    public function getCarbrandEntityId(): ?string
    {
        return $this->getData(self::CARBRAND_ENTITY_ID);
    }

    /**
     * Set carbrand_entity_id
     * @param string $carbrand_entity_id
     * @return CarModelInterface
     */
    public function setCarbrandEntityId(string $carbrand_entity_id): CarModelInterface
    {
        return $this->setData(self::CARBRAND_ENTITY_ID, $carbrand_entity_id);
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
     * @return CarModelInterface
     */
    public function setName(string $name): CarModelInterface
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
     * @return CarModelInterface
     */
    public function setCode(string $code): CarModelInterface
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
     * @return CarModelInterface
     */
    public function setImageUrl(string $image_url): CarModelInterface
    {
        return $this->setData(self::IMAGE_URL, $image_url);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return CarModelExtensionInterface|null
     */
    public function getExtensionAttributes(): ?CarModelExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param CarModelExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        CarModelExtensionInterface $extensionAttributes
    ): static {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
