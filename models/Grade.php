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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['user_id' => 'student_id']);
    }

    public function beforeSave(){
        if($this->student_id == null){
            $this->student_id = Yii::$app->user->identity->id;
        }
        return true;
    }
}
