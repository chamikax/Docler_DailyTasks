<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Controller\Adminhtml\Tasks;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class AddTask
 * @package Docler\DailyTasks\Controller\Adminhtml\Tasks
 */
class AddTask extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory
    ) {
        $this->pageFactory = $rawFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Layout
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Docler_DailyTasks::docler');
        $resultPage->getConfig()->getTitle()->prepend(__('Docler Daily Tasks'));

        return $resultPage;
    }
}
