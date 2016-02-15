<?php

namespace app\assets;

use yii\web\AssetBundle;

class FilterAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-select.css'
    ];
    public $js = [
        'js/bootstrap-select.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}