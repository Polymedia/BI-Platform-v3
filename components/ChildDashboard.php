<?php

namespace app\components;

use Yii;
use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;

class ChildDashboard extends Widget
{
    public $label = "Child dashboard";
    
	public function init()
    {
		parent::init();
	}
	
	public function run()
    {
        parent::run();
        
        $server = Yii::$app->request->serverName;
        $rpcServer = 'http://' . $server . ':8080';
        
        $this->getView()->registerJsFile($rpcServer . '/eureca.js');
        $parent = Yii::$app->request->getQueryParam("parent", NULL);
        
        // Do not render button on clild dashboard
        if (!$parent) {
            $this->getView()->registerJsFile($rpcServer . '/parent.js');
            $this->getView()->registerJs('Parent.init()', View::POS_END);

            $url = Yii::$app->request->url;
		    return Html::a($this->label, $url, ['target' => '_blank', 'class'=>'btn btn-primary btn-child']);   
        } else {
            $this->getView()->registerJsFile($rpcServer . '/child.js');
            $this->getView()->registerJs('Child.init()', View::POS_END);
        }
	}
}
