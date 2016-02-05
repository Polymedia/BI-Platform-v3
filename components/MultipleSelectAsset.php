<?php

namespace app\components;


use yii\web\AssetBundle;

class MultipleSelectAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/multiple-select.css',
    ];
    public $js = [
        'js/multiple-select.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}