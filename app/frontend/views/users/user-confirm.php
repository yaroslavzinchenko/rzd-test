<?php
use yii\helpers\Html;

/* @var $model common\models\RequestForm */
?>

<p>Данные успешно сохранены в базу данных.</p>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>From</label>: <?= Html::encode($model->from) ?></li>
    <li><label>To</label>: <?= Html::encode($model->to) ?></li>
    <li><label>Text</label>: <?= Html::encode($model->text) ?></li>
</ul>
