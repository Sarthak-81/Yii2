<?php

namespace app\models;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return 
        [
            [["username", "password"], "required"],
            ["password", "validatePassword"]
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || $this->password !== $user['password']) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function getUser()
    {
        $user = Yii::$app->db->createCommand("SELECT * FROM user_details WHERE BINARY username = :username")
        ->bindValue(':username', $this->username)
        ->queryOne(); 
        return $user;
    }


    public function login()
    {
        if ($this->validate()) 
        {
            Yii::$app->session->set('name', $this->username);
            return true; 
        }
        return false;
    }
}


 // public function getPassword()
    // {
    //     $user = Yii::$app->db->createCommand("SELECT * FROM user_details WHERE password = :password")
    //     ->bindValue(':password', $this->password)
    //     ->queryOne();        
    //     return $password;
    // }

      // public function validatePassword($attribute)
    // {
    //     if (!$this->hasErrors())
    //     {
    //         $user = $this->getUser();
            
    //         if (!$user || !$password) 
    //         {
    //             $this->password = '';
    //             $this->addError($attribute, 'Incorrect username or password.');
    //         }
    //     }
    // }


