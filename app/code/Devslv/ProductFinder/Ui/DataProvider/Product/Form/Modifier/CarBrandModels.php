<?php

namespace Devslv\ProductFinder\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Framework\Phrase;
use Magento\Ui\Component\Form\Fieldset;

class CarBrandModels extends AbstractModifier
{
    /**
     * @param array $meta
     *
     * @return array
     */
    public function modifyMeta(array $meta): array
    {

        $meta['car_brand_models'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Car Brands and Models'),
                        'sortOrder' => 999,
                        'collapsible' => true,
                        'componentType' => Fieldset::NAME
                    ]
                ]
            ],
            'children' => [
                'button_set' => $this->getButton(),
            ]
        ];

        return $meta;
    }

    /**
     * {@inheritdoc}
     */
    public function modifyData(array $data)
    {
        return $data;
    }

    protected function getButton()
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'formElement' => 'container',
                        'componentType' => 'container',
                        'label' => false,
                        'template' => 'ui/form/components/complex',
                    ]
                ]
            ],
            'children' => [
                'button_car_brand_model' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'formElement' => 'container',
                                'componentType' => 'container',
                                'component' => 'Magento_Ui/js/form/components/button',
                                'title' => 'Add Car Brand Models',
                                'provider' => null,
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
