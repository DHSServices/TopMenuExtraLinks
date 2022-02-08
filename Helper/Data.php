<?php

namespace DHSServices\TopMenuExtraLinks\Helper;

use Magento\Framework\App\Action\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public function getConfigValue($value = '') {
        return $this->scopeConfig
                ->getValue($value, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
