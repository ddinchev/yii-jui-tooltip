# Yii1.1 jQuery UI Tooltip Widget

This is minimalistic widget that wraps jQuery UI tooltip, which comes in shipped
with Yii 1.1.13 onwards:
http://jqueryui.com/tooltip/

# Composer installation
The preferred way to install this extension is through
[composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require ddinchev/yii-jui-tooltip-widget
```

or add

```
"ddinchev/yii-jui-tooltip-widget": "*"
```

to the `require` section of your `composer.json` file.

Now you can use the widget like this:

```php
Yii::require('application.vendor.ddinchev.yii-jui-tooltip-widget.EJuiTooltip');
$this->widget('EJuiTooltip', array('selector' => '.tooltip'));
```

Once the widget has been included, way all links that have "tooltip" class and
have "title" attribute will start displaying tooltips on hover containing the
content of the "title" attribute. For more options check:
http://jqueryui.com/tooltip/

# Manual installation
Download `EJuiTooltip.php` to `protected/extensions/juitooltip/EJuiTooltip.php`.
Now you can use the widget like this:

```php
Yii::import('application.extensions.juitip.EJuiTooltip', true);
$this->widget('EJuiTooltip', array('selector' => '.tooltip'));
```
