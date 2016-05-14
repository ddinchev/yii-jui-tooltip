<?php

Yii::import('zii.widgets.jui.CJuiWidget');

/**
 * EJuiTooltio class file.
 *
 * EJuiTooltio displays a tooltip widget.
 *
 * EJuiTooltio encapsulates the {@link http://jqueryui.com/demos/tooltip/ JUI Tooltip}
 * plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('application.extensions.juitooltip.EJuiTooltio', array(
 *     // elements selector, by default their title attribute will be used as content
 *     'selector' => '.tooltip',
 *     // additional javascript options for the tooltip plugin
 *     'options' => array(
 *         'scope' => 'myScope',
 *     ),
 * ));
 *
 * </pre>
 *
 * By configuring the {@link options} property, you may specify the options
 * that need to be passed to the JUI Tooltip plugin. Please refer to
 * the {@link http://jqueryui.com/demos/tooltip/ JUI Draggable} documentation
 * for possible options (name-value pairs).
 *
 *
 * @author Dimitar Dinchev <dinchev.dimitar@gmail.com>
 * @link http://www.yiiframework.com/
 */
class EJuiTooltip extends CJuiWidget
{
    /**
     * @var string Tooltip selector, defaults to document (all elements with title attribute
     * will have tooltip with the title attribute content used as tooltip content)
     */
    public $selector = 'document';

    /**
     * Renders the close tag of the draggable element.
     */
    public function run()
    {
        Yii::app()->clientScript->registerScript(__CLASS__ . $this->selector,
            $this->getJavascriptString($this->selector, $this->options)
        );
    }

    /**
     * @param $selector
     * @param array $options
     * @return string
     */
    public function getJavascriptString($selector, array $options = [])
    {
        if (!isset($options['content'])) {
            $options['content'] = 'js: function() { return $(this).prop("title"); }';
        }
        $options = CJavaScript::encode($options);
        return "$('{$selector}').tooltip($options)";
    }

    /**
     * Helper method for afterAjaxUpdate calls
     * @param $selector
     * @param array $options
     * @return CJavaScriptExpression
     */
    public function getJavascriptFunction($selector, array $options = [])
    {
        return new CJavaScriptExpression(sprintf('function () { %s }', $this->getJavascriptString($selector, $options)));
    }
}