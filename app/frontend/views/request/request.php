<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Users;

/* @var $model common\models\RequestForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'request-form',
]); ?>

<?= $form->field($model, 'from')->label('От кого')->dropDownList(
        Users::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt'=>'Выберите отправителя']) ?>

<ul style="font-size: 1.5rem;" id="userFrom">
    <li>Имя: <ins id="userName"></ins></li>
    <li>Логин: <ins id="userLogin"></ins></li>
    <li>Электронная почта: <ins id="userEmail"></ins></li>
    <li>Уникальный идентификатор: <ins id="userUid"></ins></li>
</ul>

<?= $form->field($model, 'to')->label('Кому')->dropDownList(
    Users::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt'=>'Выберите получателя']) ?>

<ul style="font-size: 1.5rem;" id="userTo">
    <li>Имя: <ins id="userNameTo"></ins></li>
    <li>Логин: <ins id="userLoginTo"></ins></li>
    <li>Электронная почта: <ins id="userEmailTo"></ins></li>
    <li>Уникальный идентификатор: <ins id="userUidTo"></ins></li>
</ul>

<?= $form->field($model, 'text')->label('Текст заявки')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<script>
    $(function() {
        $('#userFrom').hide();
        $('#requestform-from').change(function(){
            if($('#requestform-from').val() != '') {
                $('#userFrom').show();

                var id = $(this).val();

                $.ajax({
                    method : 'GET',
                    dataType : 'text',
                    url : 'request/ajax?id=' + id,
                    success : function (response) {
                        var response = JSON.parse(response);

                        document.getElementById('userName').innerText = response.userName;
                        document.getElementById('userLogin').innerText = response.userLogin;
                        document.getElementById('userEmail').innerText = response.userEmail;
                        document.getElementById('userUid').innerText = response.userUid;
                    }
                });
            } else {
                $('#userFrom').hide();
            }
        });
    });

    $(function() {
        $('#userTo').hide();
        $('#requestform-to').change(function(){
            if($('#requestform-to').val() != '') {
                $('#userTo').show();

                var id = $(this).val();

                $.ajax({
                    method : 'GET',
                    dataType : 'text',
                    url : 'request/ajax?id=' + id,
                    success : function (response) {
                        var response = JSON.parse(response);

                        document.getElementById('userNameTo').innerText = response.userName;
                        document.getElementById('userLoginTo').innerText = response.userLogin;
                        document.getElementById('userEmailTo').innerText = response.userEmail;
                        document.getElementById('userUidTo').innerText = response.userUid;
                    }
                });
            } else {
                $('#userTo').hide();
            }
        });
    });
</script>
