<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Users;

/** @var yii\web\View $this */
/** @var common\models\Requests $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_id')->label('От кого')->dropDownList(
        Users::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt'=>'Выберите отправителя']) ?>

    <?= $form->field($model, 'to_id')->label('Кому')->dropDownList(
        Users::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt'=>'Выберите получателя']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
