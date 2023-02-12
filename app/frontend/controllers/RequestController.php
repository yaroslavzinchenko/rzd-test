<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\RequestForm;
use common\models\Requests;
use common\models\Users;

class RequestController extends Controller
{
    public function actionRequest()
    {
        $model = new RequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

//            print_r($model->from);exit;
//            $model->save();

            $requests = new Requests();
            $requests->from_id = $model->from;
            $requests->to_id = $model->to;
            $requests->text = $model->text;
            $requests->save();
//            print_r($requests->text);exit;

            return $this->renderPartial('request-confirm', ['model' => $model,]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->renderPartial('request', ['model' => $model,]);
        }
    }

    public function actionAjax($id)
    {
        $user = Users::findOne($id);
        $user = [
            "userId" => $user->id,
            "userName" => $user->name,
            "userLogin" => $user->login,
            "userEmail" => $user->email,
            "userUid" => $user->uid];

        return json_encode($user);
    }
}