<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class FilterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/Filter.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}