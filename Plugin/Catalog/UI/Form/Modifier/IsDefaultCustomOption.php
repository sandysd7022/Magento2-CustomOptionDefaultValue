<?php

declare(strict_types=1);

namespace SD\CustomOptionDefaultValue\Plugin\Catalog\UI\Form\Modifier;

use SD\CustomOptionDefaultValue\Model\Config;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\CustomOptions;
use Magento\Ui\Component\Form\Element\Checkbox;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Field;

class IsDefaultCustomOption
{
    protected const FIELD_IS_DEFAULT = 'is_default';
    protected const FIELD_EXTRA_INFO = 'extra_info';
    private const DEFAULT_SORT_ORDER = 70;
    private const EXTRA_INFO_SORT_ORDER = 50;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function afterModifyMeta(CustomOptions $subject, array $meta): array
    {
        if (!$this->config->isActiveModule()) {
            return $meta;
        }

        return array_replace_recursive($meta, [
            CustomOptions::GROUP_CUSTOM_OPTIONS_NAME => [
                'children' => [
                    CustomOptions::GRID_OPTIONS_NAME => [
                        'children' => [
                            'record' => [
                                'children' => [
                                    CustomOptions::CONTAINER_OPTION => [
                                        'children' => [
                                            CustomOptions::GRID_TYPE_SELECT_NAME => [
                                                'children' => [
                                                    'record' => [
                                                        'children' => [
                                                            static::FIELD_EXTRA_INFO => $this->getExtraInfoFieldConfig(self::EXTRA_INFO_SORT_ORDER),
                                                            static::FIELD_IS_DEFAULT => $this->getIsDefaultFieldConfig(self::DEFAULT_SORT_ORDER),
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    protected function getIsDefaultFieldConfig($sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Default Value'),
                        'componentType' => Field::NAME,
                        'formElement' => Checkbox::NAME,
                        'dataScope' => static::FIELD_IS_DEFAULT,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'value' => '0',
                        'valueMap' => [
                            'true' => '1',
                            'false' => '0',
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getExtraInfoFieldConfig($sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Extra Info'),
                        'componentType' => Field::NAME,
                        'formElement' => 'input',
                        'dataScope' => static::FIELD_EXTRA_INFO,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'visible' => true,
                    ],
                ],
            ],
        ];
    }
}
