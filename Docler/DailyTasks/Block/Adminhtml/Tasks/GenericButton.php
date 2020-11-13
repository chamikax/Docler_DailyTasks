<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */
namespace Docler\DailyTasks\Block\Adminhtml\Tasks;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

/**
 * Class GenericButton
 * @package Docler\DailyTasks\Block\Adminhtml\Tasks
 */
class GenericButton
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var Registry
     */
    protected $registry;

    /**
     * GenericButton constructor.
     * @param Context $context
     * @param UrlInterface $urlBuilder
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        Registry $registry
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->registry = $registry;
    }


    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    /**
     * @param string $name
     * @return string
     */
    public function canRender(string $name)
    {
        return $name;
    }
}
