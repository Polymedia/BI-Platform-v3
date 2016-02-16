<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class FilterAsset extends AssetBundle
{
    public $jsOptions = ['position' => View::POS_HEAD];
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