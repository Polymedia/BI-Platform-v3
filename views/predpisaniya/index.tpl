{use class="app\components\HistogramWidget"}
{use class="app\components\PieWidget"}
{use class="miloschuman\highcharts\Highcharts"}
{use class="miloschuman\highcharts\HighchartsAsset"}
{use class="app\components\ChildDashboard"}
{use class="app\components\Select"}
{assign "hc" HighchartsAsset::register($this)->withScripts(['highcharts', 'modules/exporting', 'modules/drilldown', 'modules/data'])}
{use class="app\components\MultipleSelect"}
{use class="app\components\TableWidget"}
{use class="app\components\HistogramWidget"}





<h1 style="text-align: center;"><strong><span style="color: #3366ff;">Предписания</span></strong></h1>

<style>
    td.pad {
        padding: 10px;
    }
</style>

<table>
    <tbody>
    <tr>
        <td style="width: 367px; text-align: right;" class="pad">Проект</td>
        <td style="width: 367px; margin: 10px;" class="pad">{Select::widget(['name' => 'filter_project'])}</td>
    </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
    <tr>
        <td style="width: 427px; text-align: right;" class="pad">Классификация</td>
        <td style="width: 427px;">{MultipleSelect::widget(['name' => 'filter_classification'])}</td>
        <td style="width: 427px;">Последнее обновление данных {$updateDate}</td>
    </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
    <tr style="height: 60px;">
        <td style="width: 556px; text-align: center;">
            <strong>Распределение предписаний от органов, выдавших замечания, подрядчикам и субподрядчикам</strong>
        </td>
        <td style="width: 556px;">
            <table>
                <tbody>
                <tr style="height: 50px;">
                    <td style="width: 267px; text-align: right;" class="pad">Подрядчик</td>
                    <td style="width: 268px;">{MultipleSelect::widget(['name' => 'filter_podryadchik'])}</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="width: 556px;">
            <table>
                <tbody>
                <tr style="height: 50px;">
                    <td style="width: 267px; text-align: right;" class="pad">Замечания</td>
                    <td style="width: 268px;">
                        {MultipleSelect::widget(['name' => 'filter_zamechaniya'])}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="width: 556px;">
            <table width="570">
                <tbody>
                <tr style="height: 13.4688px;">
                    <td style="width: 93px; text-align: right; height: 13.4688px;" class="pad">Период от</td>
                    <td style="width: 233px; height: 13.4688px;">{Select::widget(['name' => 'filter_datefrom'])}</td>
                    <td style="width: 33px; height: 13.4688px; text-align: right;" class="pad">до</td>
                    <td style="width: 233px; height: 13.4688px;">{Select::widget(['name' => 'filter_dateto'])}</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<br>

<table>
    <tbody>
    <tr style="height: 50px;">
        <td style="width: 543px;">{HistogramWidget::widget(['name' => 'widget_histogram', 'title' => ""])}</td>
        <td style="width: 543px;">
            <table>
                <tbody>
                <tr style="height: 50px;">
                    <td style="width: 259px; height: 39px; text-align: center;">
                        <strong>Открытые замечания</strong>
                    </td>
                    <td style="width: 260px; height: 39px; text-align: center;">
                        <strong>Просроченные замечания</strong>
                    </td>
                </tr>
                <tr style="height: 13.4688px; text-align: center;">
                    <td style="width: 259px; height: 13.4688px;">
                        отчет на конец периода
                    </td>
                    <td style="width: 260px; height: 13.4688px; text-align: center;">
                        отчет за период
                    </td>
                </tr>
                <tr style="height: 39px;">
                    <td style="width: 259px; height: 39px;">
                        <div class="col-md-6">{PieWidget::widget(['name' => "widget_pie_otkritie", 'title' => ""])}</div>
                    </td>
                    <td style="width: 260px; height: 39px;">
                        <div class="col-md-6">{PieWidget::widget(['name' => "widget_pie_prosrochennie", 'title' => ""])}</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<script>
    var getParameters = window.location.search.replace("?", "");
    var forms, i;

    if (getParameters)
        getParameters = getParameters.split('&')

    forms = document.getElementsByTagName('form');
    for (i = 0; i < forms.length; ++i) {
        if (forms[i].getAttribute('method') == 'get') {
            var j;

            for (j = 0; j < getParameters.length; ++j) {
                var getParameter = getParameters[j].split('=');

                if (forms[i].id == decodeURIComponent(getParameter[0]).split('[')[0])
                    continue;

                var input = document.createElement("input");
                input.type = 'hidden';
                input.name = decodeURIComponent(getParameter[0]);
                input.value = decodeURIComponent(getParameter[1].replace(/\+/g,  " "));

                forms[i].appendChild(input);
            }
        }
    }
</script>