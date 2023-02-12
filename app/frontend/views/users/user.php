<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $user common\models\Users */
/* @var $model common\models\RequestForm */
?>

<h1>Пользователь <?= Html::encode("{$user->id}") ?></h1>

<ul style="font-size: 1.5rem;">
    <li>Имя: <?= Html::encode("{$user->name}") ?></li>
    <li>Логин: <?= Html::encode("{$user->login}") ?></li>
    <li>Электронная почта: <?= Html::encode("{$user->email}") ?></li>
    <li>Уникальный идентификатор<?= Html::encode("{$user->uid}") ?></li>
</ul>


<?php $form = ActiveForm::begin([
    'id' => 'request-form',
]); ?>

<?= $form->field($model, 'from')->label('От кого')->dropDownList(
    $user::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt'=>'Выберите отправителя']) ?>

<?= $form->field($model, 'to')->hiddenInput(['value'=>$user->id])->label(false) ?>

<?= $form->field($model, 'text')->label('Текст заявки')->textarea() ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
