<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Store\Model\Validation;

use Magento\Framework\Validator\AbstractValidator;
use Magento\Framework\Validator\DataObjectFactory;

/**
 * Store model validator.
 */
class StoreValidator extends AbstractValidator
{
    /**
     * @var DataObjectFactory
     */
    private $dataObjectValidatorFactory;

    /**
     * @var array
     */
    private $rules;

    /**
     * @param DataObjectFactory $dataObjectValidatorFactory
     * @param array $rules
     */
    public function __construct(DataObjectFactory $dataObjectValidatorFactory, array $rules)
    {
        $this->dataObjectValidatorFactory = $dataObjectValidatorFactory;
        $this->rules = $rules;
    }

    /**
     * @inheritDoc
     */
    public function isValid($value)
    {
        $validator = $this->dataObjectValidatorFactory->create();
        foreach ($this->rules as $fieldName => $rule) {
            $validator->addRule($rule, $fieldName);
        }

        return $validator->isValid($value);
    }
}
