<?php

namespace Docler\DailyTasks\Model;

use Docler\DailyTasks\Model\ResourceModel\Tasks\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $tasksCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $tasksCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $employee) {
            $this->_loadedData[$employee->getId()] = $employee->getData();
        }
        return $this->_loadedData;
    }
}
