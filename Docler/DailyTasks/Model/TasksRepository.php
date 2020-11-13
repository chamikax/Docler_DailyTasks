<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Model;

use Docler\DailyTasks\Api\Data\TasksInterface;
use Docler\DailyTasks\Api\Data\TasksSearchResultInterfaceFactory;
use Docler\DailyTasks\Api\TasksRepositoryInterface;
use Docler\DailyTasks\Model\ResourceModel\Tasks\CollectionFactory as TasksCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class TasksRepository
 * @package Docler\DailyTasks\Model
 */
class TasksRepository implements TasksRepositoryInterface
{
    /**
     * @var \Docler\DailyTasks\Model\TasksFactory
     */
    private $tasksFactory;

    /**
     * @var TasksCollectionFactory
     */
    private $tasksCollectionFactory;

    /**
     * @var TasksSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * TasksRepository constructor.
     * @param TasksFactory $tasksFactory
     * @param TasksCollectionFactory $tasksCollectionFactory
     * @param TasksSearchResultInterfaceFactory $tasksSearchResultInterfaceFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        TasksFactory $tasksFactory,
        TasksCollectionFactory $tasksCollectionFactory,
        TasksSearchResultInterfaceFactory $tasksSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->tasksFactory = $tasksFactory;
        $this->tasksCollectionFactory = $tasksCollectionFactory;
        $this->searchResultFactory = $tasksSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return TasksInterface|Tasks
     * @throws NoSuchEntityException
     */
    public function getById(int $id)
    {
        $tasks = $this->tasksFactory->create();
        $tasks->getResource()->load($tasks, $id);
        if (!$tasks->getId()) {
            throw new NoSuchEntityException(__('Unable to find tasks with ID "%1"', $id));
        }
        return $tasks;
    }

    /**
     * @param TasksInterface $tasks
     * @return TasksInterface|mixed
     */
    public function save(TasksInterface $tasks)
    {
        $tasks->getResource()->save($tasks);
        return $tasks;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Docler\DailyTasks\Api\Data\TasksSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->tasksCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, ($collection));
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}
