<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAssetHead extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        //'js/bootstrap-combobox.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\components\MultipleSelectAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        //'yii\bootstrap\BootstrapThemeAsset',
    ];
}