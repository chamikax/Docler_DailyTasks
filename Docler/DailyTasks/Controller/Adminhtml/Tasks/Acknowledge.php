<?php
namespace Docler\DailyTasks\Controller\Adminhtml\Tasks;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Ui\Component\MassAction\Filter;

class Acknowledge extends Action
{
    const ADMIN_RESOURCE = 'Magento_Catalog::categories';

    protected $filter;

    public function __construct(
        Action\Context $context,
        Filter $filter
    ) {
        $this->filter = $filter;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->getRequest()->getData('id')) {
            throw new NotFoundException(__('Task Id not found'));
        }

        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $categoryDeleted = 0;
        foreach ($collection->getItems() as $category) {
            $this->categoryRepository->delete($category);
            $categoryDeleted++;
        }

        if ($categoryDeleted) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $categoryDeleted)
            );
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('dev_grid/index/index');
    }
}
