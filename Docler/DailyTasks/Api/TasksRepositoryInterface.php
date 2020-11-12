<?php

namespace Docler\DailyTasks\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TasksRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param $task
     * @return mixed
     */
    public function save($task);
}
