<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property string $id
 * @property string $subject_id
 * @property string $result
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id'], 'integer'],
            [['result'], 'required'],
            [['result'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'result' => Yii::t('app', 'Result'),
        ];
    }
}
