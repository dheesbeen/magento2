<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Store\Model\Validation;

use Magento\Framework\Validator\AbstractValidator;
use Magento\Framework\Validator\NotEmptyFactory;

/**
 * Validator for store name.
 */
class StoreNameValidator extends AbstractValidator
{
    /**
     * @var NotEmptyFactory
     */
    private $notEmptyValidatorFactory;

    /**
     * @param NotEmptyFactory $notEmptyValidatorFactory
     */
    public function __construct(NotEmptyFactory $notEmptyValidatorFactory)
    {
        $this->notEmptyValidatorFactory = $notEmptyValidatorFactory;
    }

    /**
     * @inheritDoc
     */
    public function isValid($value)
    {
        $validator = $this->notEmptyValidatorFactory->create();
        $validator->setMessage(__('Name is required'), \Zend_Validate_NotEmpty::IS_EMPTY);

        return $validator->isValid($value);
    }
}
