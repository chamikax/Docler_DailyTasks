<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface TasksSearchResultInterface
 * @package Docler\DailyTasks\Api\Data
 */
interface TasksSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Docler\DailyTasks\Api\Data\TasksInterface[]
     */
    public function getItems();

    /**
     * @param \Docler\DailyTasks\Api\Data\TasksInterface[] $items
     * @return void
     */
    public function setItems(array $items);

}
