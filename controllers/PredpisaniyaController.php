<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 05.02.2016
 * Time: 9:33
 */


namespace app\controllers;

use Yii;


use ПредписанияQuery;
use ПроектыQuery;
use ТипыЗамечанийQuery;
use ПодрядчикиПредписанияQuery;
use СтатусыЗаявкиЗавершениеQuery;
use СтатусыЗаявкиПросрочкаQuery;


class PredpisaniyaController extends BaseDashboardController
{
    public function actionIndex()
    {

        $projectFilter = $this->getFilter('filter_project');
        $projectFilter->setPossibleValues(ПроектыQuery::create()->select('Проект')->find());

        $classificationFilter = $this->getFilter('filter_classification');
        $classificationFilter->setPossibleValues(ТипыЗамечанийQuery::create()->select('Тип_замечания')->find());

        $podryadchikFilter = $this->getFilter('filter_podryadchik');
        $podryadchikFilter->setPossibleValues(ПодрядчикиПредписанияQuery::create()->select('Подрядчик')->find());

        $zamechaniyaFilter = $this->getFilter('filter_zamechaniya');
        $zamechaniyaFilter->setPossibleValues(СтатусыЗаявкиЗавершениеQuery::create()->select('Статус_завершения')->find());

        $datefromFilter = $this->getFilter('filter_datefrom');
        $datefromFilter->setPossibleValues(ПредписанияQuery::create()->select('Дата_выдачи')->distinct()->orderByдатавыдачи('DESC')->find());

        $datetoFilter = $this->getFilter('filter_dateto');
        $datetoFilter->setPossibleValues(ПредписанияQuery::create()->select('Плановая_дата_устранения')->distinct()->orderByплановаядатаустранения('DESC')->find());


        return $this->render('index.tpl');
    }
}