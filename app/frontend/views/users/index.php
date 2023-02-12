<?php
use yii\helpers\Html;

/* @var $users common\models\Users */
?>

<h1>Пользователи</h1>

<ul style="font-size: 1.5rem;">
    <?php foreach ($users as $user): ?>
        <li>
            <?= Html::encode("{$user->name}") ?>:
            <?= $user->email ?>
        </li>
    <?php endforeach; ?>
</ul>