<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property string $id
 * @property string $name
 * @property string $codename
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'codename'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['codename'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'codename' => Yii::t('app', 'Codename'),
        ];
    }
}
