<?php

namespace common\models;

use yii\base\Model;

class RequestForm extends Model
{
    public $from;
    public $to;
    public $text;

    public function rules()
    {
        return [
            [['from', 'to', 'text'], 'required'],
        ];
    }

}