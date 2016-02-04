<?php

namespace app\components;


use yii\web\AssetBundle;

class MultipleSelectAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/css/multiple-select.css',
    ];
    public $js = [
        'assets/js/multiple-select.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}