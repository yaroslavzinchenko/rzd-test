<?php

namespace common\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'login', 'email', 'uid'], 'required'],
        ];
    }
}
