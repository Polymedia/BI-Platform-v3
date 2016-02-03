<?php
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'excelFile')->fileInput() ?>

    <button>Submit</button>
    
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'dataFile',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{preview}{remove}',
                'contentOptions' => ['class' => 'action-column', 'data-method' => 'post'],
                'buttons' => [
                    'remove' => function ($url, $model, $key) {
                        $remove_url = '/files/remove?file=' . $model['dataFile'];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $remove_url, [
                                    'title' => \Yii::t('yii', 'Delete'),
                                    'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                        ]);
                    },
                    'preview' => function ($url, $model, $key) {
                        $remove_url = '/files/preview?name=' . $model['dataFile'];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $remove_url, [
                                    'title' => \Yii::t('yii', 'Preview')
                        ]);
                    }
                ]
            ]
        ]
    ]) ?>
    <?php Pjax::end(); ?>

<?php ActiveForm::end() ?>