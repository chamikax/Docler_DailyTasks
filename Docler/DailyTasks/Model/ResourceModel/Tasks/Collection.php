<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */

namespace Docler\DailyTasks\Model\ResourceModel\Tasks;

use DateTime;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class Collection
 * @package Docler\DailyTasks\Model\ResourceModel\Tasks
 */
class Collection extends SearchResult
{
    /**
     * @var Session
     */
    protected $authSession;

    /**
     * Collection constructor.
     * @param EntityFactory $entityFactory
     * @param Logger $logger
     * @param FetchStrategy $fetchStrategy
     * @param EventManager $eventManager
     * @param Session $authSession
     * @param $mainTable
     * @param null $resourceModel
     * @param null $identifierName
     * @param null $connectionName
     * @throws LocalizedException
     */
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        Session $authSession,
        string $mainTable = 'docler_daily_tasks',
        $resourceModel = null,
        $identifierName = null,
        $connectionName = null
    ) {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $mainTable,
            $resourceModel,
            $identifierName,
            $connectionName
        );

        $this->authSession = $authSession;
    }

    /**
     * @return $this|Collection
     */
    protected function _beforeLoad()
    {
        parent::_beforeLoad();

        $now = new DateTime();
        $user = $this->authSession->getUser();

        $this->addFieldToFilter('task_date', ['from' => $now->format('Y-m-d'), 'to' => $now->format('Y-m-d')]);
        $this->addFieldToFilter('user_id', ['eq' => $user->getId()]);

        return $this;
    }
}
