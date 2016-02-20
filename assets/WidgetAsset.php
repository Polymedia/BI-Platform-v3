<?php

namespace app\assets;

use yii\web\AssetBundle;

class WidgetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/Widget.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}