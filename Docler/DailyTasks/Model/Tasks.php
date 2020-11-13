<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Model;

use Docler\DailyTasks\Api\Data\TasksInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Class Tasks
 * @package Docler\DailyTasks\Model
 */
class Tasks extends AbstractExtensibleModel implements TasksInterface
{
    /**
     * @const title
     */
    const TITLE = 'title';

    protected function _construct()
    {
        $this->_init(ResourceModel\Tasks::class);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->_getData(self::TITLE);
    }
    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);
    }

}
