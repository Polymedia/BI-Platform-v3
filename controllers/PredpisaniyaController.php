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

        $query = ПредписанияQuery::create()->useПроектыQuery()->filterByпроект($projectFilter->selectedValues)->endUse();

        if ($classificationFilter->selectedValues)
            $query = $query->useТипыЗамечанийQuery()->filterByтипзамечания($classificationFilter->selectedValues)->endUse();

        /////////////////////////

        $t_left = clone $query;
        if ($zamechaniyaFilter->selectedValues)
            $t_left = $t_left->useСтатусыЗаявкиЗавершениеQuery()->filterByстатусзавершения($zamechaniyaFilter->selectedValues)->endUse();

        ///////////////////////////////////////

        $t_right = clone $query;
        if ($podryadchikFilter->selectedValues)
            $t_right = $t_right->useПодрядчикиПредписанияQuery()->filterByподрядчик($podryadchikFilter->selectedValues)->endUse();



        if ($datefromFilter->selectedValue && $datetoFilter->selectedValue)
            $t_right = $t_right->filterByдатавыдачи($datefromFilter->selectedValue, '>=')->filterByдатавыдачи($datetoFilter->selectedValue, '<=');


        ///////////////////////////////////////

        $t_left_1 = clone $t_left;
        $t_left_1 = $t_left_1->withColumn('COUNT(*)', 'Count')->select(['Count', 'Контролирующие_органы.Контролирующий_орган'])->useКонтролирующиеОрганыQuery()
            ->groupByконтролирующийорган()->endUse();

        $t_left_2 = clone $t_left;
        $t_left_2 = $t_left_2->withColumn('COUNT(*)', 'Count')->select(['Count', 'Подрядчики_предписания.Подрядчик'])->useПодрядчикиПредписанияQuery()
            ->groupByподрядчик()->endUse();

        //$tableModel = DataTable::find()->all();
        $widg = $this->getWidget('widget_xz');
        $widg->setData($t_left_1->find()->toArray());

        $widg2 = $this->getWidget('widget_xz_1');
        $widg2->setData($t_left_2->find()->toArray());

        //$this->view->get


        //echo var_dump($r->toString());
//        echo var_dump(count($t_right->find()));
//        echo var_dump(($t_right->toString()).'<br>');
//
//        echo var_dump(($t_left_1->find()->toArray()));
//        echo var_dump('<br>');
//        echo var_dump(($t_left_1->toString()));


        echo var_dump(($t_left_2->find()->toArray()));
        echo var_dump('<br>');
        echo var_dump(($t_left_2->toString()));






        return $this->render('index.tpl');
    }
}