<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Controller\Adminhtml\Tasks;

use Docler\DailyTasks\Api\TasksRepositoryInterface;
use Docler\DailyTasks\Ui\DataProvider\Tasks\Listing\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\NotFoundException;
use Magento\Ui\Component\MassAction\Filter;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class Acknowledge
 * @package Docler\DailyTasks\Controller\Adminhtml\Tasks
 */
class Acknowledge extends Action
{
    /**
     * @const admin_resource
     */
    const ADMIN_RESOURCE = 'Magento_Catalog::categories';

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var TasksRepositoryInterface
     */
    protected $tasksRepository;

    /**
     * Acknowledge constructor.
     * @param Action\Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param Logger $logger
     */
    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        TasksRepositoryInterface $tasksRepository,
        Logger $logger
    ) {
        $this->filter = $filter;
        parent::__construct($context);

        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
        $this->tasksRepository = $tasksRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $taskId = $this->getRequest()->getParam('id');
        if (!$taskId) {
            throw new NotFoundException(__('Task Id not found'));
        }

        try {
            $task = $this->tasksRepository->getById($taskId);
            $task->setAcknowledged(1);
            $task->save();

        } catch (NoSuchEntityException $e) {
            $this->messageManager->addErrorMessage(__('This task no longer exists.'));
        } catch (\Throwable $throwable) {
            $this->logger->error($throwable);
            $this->messageManager->addErrorMessage($throwable->getMessage());
        }

        $this->messageManager->addSuccessMessage(
            __('Task acknowledged successfully')
        );

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('docler/index/index');
    }
}
