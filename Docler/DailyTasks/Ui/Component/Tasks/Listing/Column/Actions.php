<?php

namespace Docler\DailyTasks\Ui\Component\Tasks\Listing\Column;

use Magento\Framework\Url;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{

    /**
     * @var Url
     */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $_viewUrl;

    /**
     * @var mixed|string
     */
    protected $_acknowledgeUrl;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Url $urlBuilder,
        $viewUrl = '',
        $acknowledgeUrl = '',
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_acknowledgeUrl = $acknowledgeUrl;
        $this->_viewUrl    = $viewUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['entity_id'])) {
                    $item[$name]['view']   = [
                        'href'  => $this->_urlBuilder->getUrl($this->_viewUrl, ['id' => $item['entity_id']]),
                        'label' => __('View Task')
                    ];

                    $item[$name]['acknowledge']   = [
                        'href'  => $this->_urlBuilder->getUrl($this->_acknowledgeUrl, ['id' => $item['entity_id']]),
                        'label' => __('Acknowledge')
                    ];
                }
            }
        }

        return $dataSource;
    }
}
