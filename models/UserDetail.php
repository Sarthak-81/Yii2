<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_details".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 */
class UserDetail extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_details';
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email', 'password'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function validatePassword($password)
    {
        return $this->password = $password;
    }
}
