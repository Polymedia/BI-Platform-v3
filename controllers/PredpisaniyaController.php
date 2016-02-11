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
use СтатусыЗаявкиПросрочкаQuery;



class PredpisaniyaController extends BaseDashboardController
{
    public function actionIndex()
    {
        $allProjects = ПроектыQuery::create()->select('Проект')->find();
        $projectFilter = $this->getFilter('filter_project');
        $projectFilter->setPossibleValues($allProjects);
        if (!$projectFilter->isSelected() && count($allProjects->possibleValues))
            $projectFilter->setSelectedValues($allProjects[0]);


        $allClassifications = ПредписанияQuery::create()->select('ТипыЗамечаний.Тип_замечания')
            ->useПроектыQuery()->filterByпроект($projectFilter->selectedValue)->endUse()
            ->useТипыЗамечанийQuery()->endUse()
            ->distinct();

        $classificationFilter = $this->getFilter('filter_classification');
        $classificationFilter->setPossibleValues($allClassifications->find());
        if (!$classificationFilter->isSelected())
            $classificationFilter->setSelectedValues($classificationFilter->possibleValues);


        $allPodryadchiks = ПредписанияQuery::create()->select('ПодрядчикиПредписания.Подрядчик')
            ->useПроектыQuery()->filterByпроект($projectFilter->selectedValue)->endUse()
            ->useПодрядчикиПредписанияQuery()->endUse()
            ->useТипыЗамечанийQuery()->filterByтипзамечания($classificationFilter->selectedValues)->endUse()
            ->distinct();

        //echo var_dump($allPodryadchiks->toString());

        $podryadchikFilter = $this->getFilter('filter_podryadchik');
        $podryadchikFilter->setPossibleValues($allPodryadchiks->find());
        if (!$podryadchikFilter->isSelected())
            $podryadchikFilter->setSelectedValues($podryadchikFilter->possibleValues);

        $zamechaniyaFilter = $this->getFilter('filter_zamechaniya');
        $zamechaniyaFilter->setPossibleValues(СтатусыЗаявкиЗавершениеQuery::create()->select('Статус_завершения')->find());
        if (!$zamechaniyaFilter->isSelected() && count($zamechaniyaFilter->possibleValues))
            $zamechaniyaFilter->setSelectedValues($zamechaniyaFilter->possibleValues[0]);


        $dates = ПредписанияQuery::create()->select('Дата_выдачи')->distinct()->orderByдатавыдачи('DESC')->find()->toArray();
        $lastDate = $dates[0];
        $firstDate = end($dates);

        $lastDateInt = strtotime($lastDate);
        $firstDateInt = strtotime($firstDate);
        $date = $lastDateInt;
        $dates = [];

        while ($date >= $firstDateInt) {
            $dates[] = date("Y-m-d", $date);
            $date -= 86400;
        }

        $datefromFilter = $this->getFilter('filter_datefrom');
        $datefromFilter->setPossibleValues($dates);
        if (!$datefromFilter->isSelected() && count($datefromFilter->possibleValues)) {
            $datefromFilter->setSelectedValues($firstDate);
        }

        $datetoFilter = $this->getFilter('filter_dateto');
        $datetoFilter->setPossibleValues($dates);
        if (!$datetoFilter->isSelected() && count($datetoFilter->possibleValues)) {
            $datetoFilter->setSelectedValues($lastDate);
        }

        $query = ПредписанияQuery::create()->useПроектыQuery()->filterByпроект($projectFilter->selectedValue)->endUse();

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

        $query_1 = clone $t_right;

        if ($datefromFilter->selectedValue && $datetoFilter->selectedValue)
            $t_right = $t_right->filterByдатавыдачи($datefromFilter->selectedValue, '>=')->filterByдатавыдачи($datetoFilter->selectedValue, '<=');

        ////////////////////////////////////////


        $prosrochenoNaNachalo = clone $query_1;
        $prosrochenoNaNachalo = $prosrochenoNaNachalo->
            where('Плановая_дата_устранения < \''.$datefromFilter->selectedValue.'\'')->
            where('(Фактическая_дата_устранения > Плановая_дата_устранения AND Фактическая_дата_устранения > \''.$datefromFilter->selectedValue.'\' OR Фактическая_дата_устранения is NULL)')
            ->count();
        //echo var_dump(count($prosrochenoNaNachalo->find()->toArray()));
        //echo var_dump($prosrochenoNaNachalo->toString());
        //echo var_dump(date('Y-m-d'));

        /////////////////////////////////////////

        $propsrochenoZaPeriodUstraneno = clone $query_1;
        $propsrochenoZaPeriodUstraneno = $propsrochenoZaPeriodUstraneno->
            where('Плановая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')->
            where('Плановая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')->
            where('Фактическая_дата_устранения > Плановая_дата_устранения')->
            where('Фактическая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->count()
        ;
        //echo var_dump(count($propsrochenoZaPeriodUstraneno->find()->toArray()));
        //echo var_dump($propsrochenoZaPeriod->toString());

        ////////////////////////////////////////

        $propsrochenoZaPeriodNeUstraneno = clone $query_1;
        $propsrochenoZaPeriodNeUstraneno = $propsrochenoZaPeriodNeUstraneno->
            where('Плановая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')->
            where('Плановая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')->
            where('Фактическая_дата_устранения > Плановая_дата_устранения')->
            where('(Фактическая_дата_устранения > \''.$datetoFilter->selectedValue.'\' OR Фактическая_дата_устранения is NULL)')
            ->count();
        ;

        //echo var_dump(count($propsrochenoZaPeriodNeUstraneno->find()->toArray()));
        //echo var_dump($propsrochenoZaPeriodNeUstraneno->toString());

        ////////////////////////////////////////

        $prosrochenoNaNachaloUstraneno = clone $query_1;
        $prosrochenoNaNachaloUstraneno = $prosrochenoNaNachaloUstraneno->
            where('Плановая_дата_устранения < \''.$datefromFilter->selectedValue.'\'')->
            where('Фактическая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')->
            where('Фактическая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->count()
        ;


        //echo var_dump(count($prosrochenoNaNachaloUstraneno->find()->toArray()));
        //echo var_dump($prosrochenoNaNachaloUstraneno->toString());


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

        if (isset($r)) {
            $widg3 = $this->getWidget('widget_hist1');
            $widg3->setCategories(ArrayHelper::getColumn($t_left_1->find()->toArray(), "Контролирующие_органы.Контролирующий_орган"));
            $widg3->setSeries($r);
        }

        $widg4 = $this->getWidget('widget_pie_left');
        $pie_serie = $t_right->withColumn('COUNT(*)', 'Count')
            ->select(['СтатусыЗаявкиПросрочка.Статус_просрочки', 'Count'])
            ->useСтатусыЗаявкиПросрочкаQuery()
            ->endUse()
            ->groupByстатусзаявкипросрочка()->find()->toArray();

        foreach ($pie_serie as $el) {
            $p[$el["СтатусыЗаявкиПросрочка.Статус_просрочки"]] = $el["Count"];
        }

        $pie_serie = $p;


        $widg4->setSeries($pie_serie);

        if (isset($p)) {
            $widg4->setSeries($pie_serie);
        }


        $widg5 = $this->getWidget('widget_pie_right');
        $pie_serie_2 = ['Просрочено на начало' => $prosrochenoNaNachalo, 'Просрочено за период' => $propsrochenoZaPeriodNeUstraneno + $propsrochenoZaPeriodUstraneno,
            'Устранено просроченных за период' => $propsrochenoZaPeriodUstraneno, 'Устранено просроченных на начало' => $prosrochenoNaNachaloUstraneno];
        $widg5->setSeries($pie_serie_2);


        return $this->render('index.tpl');
    }
}