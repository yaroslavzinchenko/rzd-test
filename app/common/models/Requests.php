<?php

namespace common\models;

use yii\db\ActiveRecord;

class Requests extends ActiveRecord
{
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'text',], 'required'],
        ];
    }
}