<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ClassicAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/classic';
    public $baseUrl = '@web/themes/classic';
    public $css = [
        'css/reset.css',
        'css/main.css',
    ];
    public $js = [
        'js/jquery.sticky.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
