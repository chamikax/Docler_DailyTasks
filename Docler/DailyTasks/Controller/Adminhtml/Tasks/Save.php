<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */
namespace Docler\DailyTasks\Controller\Adminhtml\Tasks;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Acknowledge
 * @package Docler\DailyTasks\Controller\Adminhtml\Tasks
 */
class Save extends Action
{

    /**
     * Save constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        //TODO save action

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('docler/index/index');
    }
}
