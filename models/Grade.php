<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property string $id
 * @property string $subject_id
 * @property string $student_id
 * @property integer $grade
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'student_id', 'grade'], 'integer'],
            [['grade'], 'required'],
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
            'student_id' => Yii::t('app', 'Student ID'),
            'grade' => Yii::t('app', 'Grade'),
        ];
    }
}
