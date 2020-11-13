<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Docler\DailyTasks\Api\Data\TasksInterface;

/**
 * Interface TasksRepositoryInterface
 * @package Docler\DailyTasks\Api
 */
interface TasksRepositoryInterface
{

    /**
     * @param int $id
     * @return \Docler\DailyTasks\Api\Data\TasksInterface
     */
    public function getById(int $id);

    /**
     * @param \Docler\DailyTasks\Api\Data\TasksInterface $task
     * @return \Docler\DailyTasks\Api\Data\TasksInterface
     */
    public function save(TasksInterface $task);

    /**
     * @param SearchCriteriaInterface $criteria
     * @return \Docler\DailyTasks\Api\Data\TasksSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}
