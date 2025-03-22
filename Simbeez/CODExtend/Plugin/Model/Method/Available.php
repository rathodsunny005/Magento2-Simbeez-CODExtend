<?php

namespace Simbeez\CODExtend\Plugin\Model\Method;

class Available
{
    /**
     * @var \Simbeez\CODExtend\Helper\Data
     */
    protected $helper;    

    /**
     * @param \Simbeez\CODExtend\Helper\Data $helper
     */
    public function __construct(
        \Simbeez\CODExtend\Helper\Data $helper
    )
    {
        $this->helper = $helper;
    }
   /**
     *
     * @param \Magento\Payment\Model\Method\AbstractMethod $subject
     * @param $result
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterIsAvailable(\Magento\Payment\Model\Method\AbstractMethod $subject, $result)
    {
        if($subject->getCode() == 'cashondelivery') {
            if($this->helper->isAllowCOD()) {
                return true;
            } else {
                return false;
            }
        }
        return $result;
    }

    /**
     * Fetch customer group ids from magento configuration
     *
     * @return string|null
     */
    public function getCustomerGroupIds()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CUSTOMER_GROUP,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}