<?php
namespace app\models;
use yii\base\Model;

class ReportForm extends Model {
    public $titulo;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['titulo', 'string'], 'required'],
        ];
    }
}