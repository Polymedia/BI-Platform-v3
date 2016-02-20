<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 05.02.2016
 * Time: 9:33
 */


namespace app\controllers;

use Yii;

use yii\helpers\ArrayHelper;
use ПредписанияQuery;
use ПроектыQuery;
use СтатусыЗаявкиЗавершениеQuery;
use ДатыОбновленийДашбордовQuery;



class PredpisaniyaController extends BaseDashboardController
{
    public function actionIndex()
    {
        $allProjects = ПроектыQuery::create()->select('Проект')->find();
        $projectFilter = $this->getFilter('filter_project');
        $projectFilter->setPossibleValues($allProjects);
        if (!$projectFilter->isSelected() && count($projectFilter->possibleValues))
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

        // Делаем $dates - массив дат с начальной даты выдачи, до конечной
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

        // Получаем запрос с выбранным проектом
        $query = ПредписанияQuery::create()->useПроектыQuery()->filterByпроект($projectFilter->selectedValue)->endUse();

        // Получаем запрос с выбранным проектом и классификацией
        if ($classificationFilter->selectedValues)
            $query = $query->useТипыЗамечанийQuery()->filterByтипзамечания($classificationFilter->selectedValues)->endUse();

        /////////////////////////

        // Получаем запрос с выбранным проектом, классификацией и состоянием замечаний
        $histogrmQuery = clone $query;
        if ($zamechaniyaFilter->selectedValues)
            $histogrmQuery = $histogrmQuery->useСтатусыЗаявкиЗавершениеQuery()->filterByстатусзавершения($zamechaniyaFilter->selectedValues)->endUse();

        // Получаем запрос с выбранным проектом, классификацией и состоянием замечаний
        $histogrmCategories = clone $histogrmQuery;
        $histogrmCategories = $histogrmCategories->withColumn('COUNT(*)', 'Count')
            ->select(['Count', 'Контролирующие_органы.Контролирующий_орган'])
            ->useКонтролирующиеОрганыQuery()->groupByконтролирующийорган()->endUse()
            ->find()->toArray();

        $histogrmSeries = clone $histogrmQuery;
        $histogrmSeries = $histogrmSeries->withColumn('COUNT(*)', 'Count')->select(['Count', 'Подрядчики_предписания.Подрядчик', 'Контролирующие_органы.Контролирующий_орган'])
            ->useПодрядчикиПредписанияQuery()->groupByподрядчик()->endUse()
            ->useКонтролирующиеОрганыQuery()->groupByконтролирующийорган()->endUse()
            ->find()->toArray();

        $r = [];
        foreach ($histogrmSeries as $el) {
            $r[$el["Подрядчики_предписания.Подрядчик"]][] = $el["Count"];
        }

        $widgetHistogram = $this->getWidget('widget_histogram');
        $widgetHistogram->setCategories(ArrayHelper::getColumn($histogrmCategories, "Контролирующие_органы.Контролирующий_орган"));
        $widgetHistogram->setSeries($r);


        ///////////////////////////////////////

        // Получаем общий запрос с выбранным проектом, классификацией и подрядчиками
        $pieQuery = clone $query;
        if ($podryadchikFilter->selectedValues)
            $pieQuery = $pieQuery->useПодрядчикиПредписанияQuery()->filterByподрядчик($podryadchikFilter->selectedValues)->endUse();

        // Получаем запрос с выбранным проектом, классификацией, подрядчиками и промежутком дат для открытых замечаний
        $otkritiePieQuery = clone $pieQuery;
        if ($datefromFilter->selectedValue && $datetoFilter->selectedValue)
            $otkritiePieQuery = $otkritiePieQuery->filterByдатавыдачи($datefromFilter->selectedValue, '>=')->filterByдатавыдачи($datetoFilter->selectedValue, '<=');

        // Выбираем количество открытых/закрытых замечаний
        $widgetPieOtkritieSeries = $otkritiePieQuery->withColumn('COUNT(*)', 'Count')
            ->select(['СтатусыЗаявкиПросрочка.Статус_просрочки', 'Count'])
            ->useСтатусыЗаявкиПросрочкаQuery()
            ->endUse()
            ->groupByстатусзаявкипросрочка()->find()->toArray();

        // Приводим к нужному формату
        $p = [];
        foreach ($widgetPieOtkritieSeries as $el) {
            $p[$el["СтатусыЗаявкиПросрочка.Статус_просрочки"]] = $el["Count"];
        }
        $widgetPieOtkritieSeries = $p;

        // Устанавливаем данные виджету
        $widgetPieOtkritie = $this->getWidget('widget_pie_otkritie');
        $widgetPieOtkritie->setSeries($widgetPieOtkritieSeries);


        ////////////////////////////////////////

        // Получаем количество просроченных замечаний на начало с выбранным проектом, классификацией, подрядчиками
        $prosrochenoNaNachalo = clone $pieQuery;
        $prosrochenoNaNachalo = $prosrochenoNaNachalo
            ->where('Плановая_дата_устранения < \''.$datefromFilter->selectedValue.'\'')
            ->where('(Фактическая_дата_устранения > Плановая_дата_устранения AND Фактическая_дата_устранения > \''.$datefromFilter->selectedValue.'\' OR Фактическая_дата_устранения is NULL)')
            ->count();

        // Получаем количество устранённых просроченных замечаний за период с выбранным проектом, классификацией, подрядчиками
        $propsrochenoZaPeriodUstraneno = clone $pieQuery;
        $propsrochenoZaPeriodUstraneno = $propsrochenoZaPeriodUstraneno
            ->where('Плановая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')
            ->where('Плановая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->where('Фактическая_дата_устранения > Плановая_дата_устранения')
            ->where('Фактическая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->count();

        // Получаем количество неустранённых просроченных замечаний за период с выбранным проектом, классификацией, подрядчиками
        $propsrochenoZaPeriodNeUstraneno = clone $pieQuery;
        $propsrochenoZaPeriodNeUstraneno = $propsrochenoZaPeriodNeUstraneno
            ->where('Плановая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')
            ->where('Плановая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->where('Фактическая_дата_устранения > Плановая_дата_устранения')
            ->where('(Фактическая_дата_устранения > \''.$datetoFilter->selectedValue.'\' OR Фактическая_дата_устранения is NULL)')
            ->count();

        // Получаем количество устранённых просроченных замечаний на начало с выбранным проектом, классификацией, подрядчиками
        $prosrochenoNaNachaloUstraneno = clone $pieQuery;
        $prosrochenoNaNachaloUstraneno = $prosrochenoNaNachaloUstraneno
            ->where('Плановая_дата_устранения < \''.$datefromFilter->selectedValue.'\'')
            ->where('Фактическая_дата_устранения > \''.$datefromFilter->selectedValue.'\'')
            ->where('Фактическая_дата_устранения < \''.$datetoFilter->selectedValue.'\'')
            ->count();

        // Устанавливаем данные виджету
        $widgetPieProsrochennie = $this->getWidget('widget_pie_prosrochennie');
        $widgetPieProsrochennieSeries = ['Просрочено на начало' => $prosrochenoNaNachalo, 'Просрочено за период' => $propsrochenoZaPeriodNeUstraneno + $propsrochenoZaPeriodUstraneno,
            'Устранено просроченных за период' => $propsrochenoZaPeriodUstraneno, 'Устранено просроченных на начало' => $prosrochenoNaNachaloUstraneno];
        $widgetPieProsrochennie->setSeries($widgetPieProsrochennieSeries);


        /////////////////////////////////////////////////

        $updateDate = ДатыОбновленийДашбордовQuery::create()
            ->useПроектыQuery()->filterByпроект($projectFilter->selectedValue)->endUse()
            ->filterByдашборд('Предписания')
            ->select('дата')->find()->toArray();

        if (count($updateDate))
            $updateDate = $updateDate[0];
        else
            $updateDate = '';

        return $this->render('index.tpl', ['updateDate' => $updateDate]);
    }
}