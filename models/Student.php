<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property string $id
 * @property string $name
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User Id'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
