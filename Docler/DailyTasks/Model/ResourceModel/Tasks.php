<?php

namespace Docler\DailyTasks\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Tasks
 * @package Docler\DailyTasks\Model\ResourceModel
 */
class Tasks extends AbstractDb
{
    /**
     * Tasks constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('docler_daily_tasks', 'entity_id');
    }


}
