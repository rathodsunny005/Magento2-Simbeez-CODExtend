<?php
namespace Simbeez\CODExtend\Model\Config\Source;

class CustomerGroup implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    protected $groupCollection;

    /**
     * Customer constructor.
     * @param \Magento\Customer\Model\ResourceModel\Group\Collection $groupCollection
     */
    public function __construct(
        \Magento\Customer\Model\ResourceModel\Group\Collection $groupCollection
    ) {
        $this->groupCollection = $groupCollection;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $data = [];
        $groupOptions = $this->groupCollection;
        foreach ($groupOptions->getData() as $key => $group) {
            $data[$key]['value'] = $group['customer_group_id'];
            $data[$key]['label'] = $group['customer_group_code'];
        }
        return $data;
    }
}
