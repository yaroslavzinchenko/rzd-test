<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Requests $model */

$this->title = 'Create Requests';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
