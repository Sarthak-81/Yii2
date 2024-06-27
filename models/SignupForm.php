<?php

namespace app\models;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6],
        ];
    }
   public function signup()
    {
        $user = new UserDetail();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);

        return $user->save() ? $user : null;
    }
}