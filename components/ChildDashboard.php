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
        $this->getView()->registerJsFile('http://127.0.0.1:8080/eureca.js');
        
        $parent = Yii::$app->request->getQueryParam("parent", NULL);
        
        // Do not render button on clild dashboard
        if (!$parent) {
            $this->getView()->registerJsFile('http://127.0.0.1:8080/parent.js');
            $this->getView()->registerJs('Parent.init()', View::POS_END);
            //$this->getView()->registerJs('$(window).bind(\'hashchange\',function(e){server.change(window.location.href);console.log(\'trololo\')})', View::POS_READY);
            $url = Yii::$app->request->url;
		    return Html::a($this->label, $url, ['target' => '_blank', 'class'=>'btn btn-primary btn-child']);   
        } else {
            $this->getView()->registerJsFile('http://127.0.0.1:8080/child.js');
            $this->getView()->registerJs('Child.init()', View::POS_END);
        }
	}
}
