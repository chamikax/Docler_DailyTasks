<?php
namespace Docler\DailyTasks\Ui\DataProvider\Tasks\Listing;

use DateTime;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

class Collection extends SearchResult
{
    protected $authSession;

    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        Session $authSession,
        $mainTable,
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
