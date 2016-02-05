<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 05.02.2016
 * Time: 9:33
 */


namespace app\controllers;

use app\controllers\classes\Helpers;
use Yii;


use yii\helpers\ArrayHelper;
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

        $t_left_2_2 = clone $t_left;
        $t_left_2_2 = $t_left_2_2->withColumn('COUNT(*)', 'Count')->select(['Count', 'Подрядчики_предписания.Подрядчик', 'Контролирующие_органы.Контролирующий_орган'])
            ->useПодрядчикиПредписанияQuery()->groupByподрядчик()->endUse()
            ->useКонтролирующиеОрганыQuery()->groupByконтролирующийорган()->endUse();


        $widg = $this->getWidget('widget_xz');
        $widg->setData($t_left_1->find()->toArray());

        $widg2 = $this->getWidget('widget_xz_1');
        $widg2->setData($t_left_2->find()->toArray());


        foreach ($t_left_2_2->find()->toArray() as $el) {
            $r[$el["Подрядчики_предписания.Подрядчик"]][] = $el["Count"];
        }

        $widg3 = $this->getWidget('widget_hist1');
        $widg3->setCategories(ArrayHelper::getColumn($t_left_1->find()->toArray(), "Контролирующие_органы.Контролирующий_орган"));
        $widg3->setSeries($r);



        //echo var_dump($t_right->find()->toArray());

        //echo var_dump($t_right->withColumn('COUNT(*)', 'Count')->select(['Count', 'статусзаявкипросрочка'])->groupByстатусзаявкипросрочка()->find()->toArray());
        //echo var_dump(ArrayHelper::getColumn($t_right->groupByстатусзаявкипросрочка()->find()->toArray(), "статусзаявкипросрочка"));

        $widg4 = $this->getWidget('widget_pie_left');
        //$widg4->setCategories(ArrayHelper::getColumn($t_left_1->find()->toArray(), "Контролирующие_органы.Контролирующий_орган"));
        $pie_serie = $t_right->withColumn('COUNT(*)', 'Count')->select(['Count', 'статусзаявкипросрочка'])->groupByстатусзаявкипросрочка()->find()->toArray();
        foreach ($pie_serie as $el) {
            $p[$el["статусзаявкипросрочка"]] = $el["Count"];
        }

//        $prosr = $p[0];
//        $neprosr = $p[1];
//
//        $norm_pie["Prosr"] = $prosr;
//        $norm_pie["Neprosr"] = $neprosr;

//        echo var_dump($norm_pie);
//        echo var_dump($p);

        $pie_serie["Zayavki"] = $p;

//        $widg4->setSeries($pie_serie);

        $widg4->setSeries($pie_serie);





        return $this->render('index.tpl');
    }
}