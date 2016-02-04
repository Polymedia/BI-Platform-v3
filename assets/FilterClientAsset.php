<?php
namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class FilterClientAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.3.0.js',
        'http://code.highcharts.com/highcharts.js',
        'js/FilterClient.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}