<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nodes".
 *
 * @property string $id
 * @property string $subject_id
 * @property string $parent_id
 * @property integer $grade
 * @property string $child_id
 * @property string $results
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nodes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'parent_id', 'grade', 'child_id'], 'integer'],
            [['grade', 'results'], 'required'],
            [['results'], 'string', 'max' => 255],
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
            'parent_id' => Yii::t('app', 'Parent ID'),
            'grade' => Yii::t('app', 'Grade'),
            'child_id' => Yii::t('app', 'Child ID'),
            'results' => Yii::t('app', 'Results'),
        ];
    }
}
