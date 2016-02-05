<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'fileName') ?>

    <div class="form-group">
        <?= Html::submitButton('Open', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>