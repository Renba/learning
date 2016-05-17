<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 */
class Student extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

	
	
	 

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }


public function getId()
    {
        return $this->id;
    }

	 public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }	
	
	
	
	 public static function findByUsername($username)
    {
       

        return self::findOne(['username'=>$username]);
    }
	
	
	   public function validatePassword($password)
    {
      return $this->password == $password;
    }
	
	
	
	
	}
