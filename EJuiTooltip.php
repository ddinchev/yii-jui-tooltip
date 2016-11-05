<?php

Yii::import('zii.widgets.jui.CJuiWidget');

/**
 * EJuiTooltip encapsulates jQuery UI Tooltip plugin.
 *
 * Example usage:
 * $this->widget('EJuiTooltip', array(
 *     // elements selector, by default their title attribute will be used as content
 *     'selector' => '.tooltip',
 *     // additional javascript options for the tooltip plugin
 *     'options' => array(
 *         'scope' => 'myScope',
 *     ),
 * ));
 *
 * By configuring the options property, you may specify the options
 * that need to be passed to the JUI Tooltip plugin. Please refer to
 * the official {@link http://jqueryui.com/demos/tooltip/} documentation
 * for possible options (name-value pairs).
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
            self::getJavascriptString($this->selector, $this->options)
        );
    }

    /**
     * @param $selector
     * @param array $options
     * @return string
     */
    public static function getJavascriptString($selector, array $options = [])
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
    public static function getJavascriptFunction($selector, array $options = [])
    {
        return new CJavaScriptExpression(sprintf('function () { %s }', self::getJavascriptString($selector, $options)));
    }
}