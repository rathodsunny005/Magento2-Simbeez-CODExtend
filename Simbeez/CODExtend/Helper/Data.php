<?php
namespace Simbeez\CODExtend\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{    
    const XML_PATH_CUSTOMER_GROUP = 'payment/cashondelivery/customer_group';
    const XML_PATH_ADMIN_ENABLE = 'payment/cashondelivery/is_enable_for_admin';

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Magento\Framework\App\State
     */
    protected $state;

    /**
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param  \Magento\Framework\App\State $state
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\App\State $state
    ) {
        parent::__construct($context);
        $this->customerSession = $customerSession;
        $this->state = $state;
    }

    /**
     * return allowed customer group ids
     *
     * @return string|null
     */
    public function getAllowedCustomerGroupIds()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CUSTOMER_GROUP,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * check COD is enable for admin or not
     *
     * @return string|null
     */
    public function isEnableForAdmin()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ADMIN_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * return current customer group id
     *
     * @return int
     */
    public function getCustomerGroupId(){
        if($this->customerSession->isLoggedIn()):
            return $this->customerSession->getCustomer()->getGroupId();
        else:
            return 0;
        endif;
    }

    /**
     * check weather COD show in frontend or not based on spacific customer group.
     *
     * @return boolean
     */
    public function isAllowCOD(){
        
        if($this->getAllowedCustomerGroupIds() == NULL) {
            $allowCustomerGroup = [];
        } else {
            $allowCustomerGroup = \explode(",",$this->getAllowedCustomerGroupIds());
        }
        
        if(\in_array($this->getCustomerGroupId(),$allowCustomerGroup) || ($this->isEnableForAdmin() && $this->state->getAreaCode() == 'adminhtml')){
            return true;
        } else {
            return false;
        }
    }
    
}
