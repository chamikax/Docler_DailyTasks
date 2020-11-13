<?php
/**
 * @author    Chamika <chamikax@gmail.com>
 * @copyright Copyright© 2020. All rights reserved.
 */
namespace Docler\DailyTasks\Block\Adminhtml\Tasks;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Docler\DailyTasks\Block\Adminhtml\Tasks
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Tasks'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90
        ];
    }

    public function getSaveUrl()
    {
        return $this->getUrl('docler/tasks/save', []);
    }
}
