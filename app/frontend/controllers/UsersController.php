<?php

namespace frontend\controllers;

use common\models\Requests;
use Yii;
use yii\web\Controller;
use common\models\Users;
use yii\web\NotFoundHttpException;
use common\models\RequestForm;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = Users::find()->orderBy('name')->all();

        return $this->renderPartial('index', [
            'users' => $users,
        ]);
    }

    public function actionUser($id)
    {
        $model = new RequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            $requests = new Requests();
            $requests->from_id = $model->from;
            $requests->to_id = $model->to;
            $requests->text = $model->text;
            $requests->save();

            return $this->renderPartial('user-confirm', ['model' => $model,]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных

            $user = Users::findOne($id);
            if (!$user) {
                throw new NotFoundHttpException("Такой пользователь не существует.");
            }

            return $this->renderPartial('user', [
                'user' => $user,
                'model' => $model,
            ]);
        }
    }
}