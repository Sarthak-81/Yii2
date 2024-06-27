<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\LoginForm;
use app\filters\BeforeLogin;
use app\filters\AfterLogin;


class SignupController extends Controller
{
    public function behaviors()
    {
        return
        [
            'BeforeLogin' => 
            [
                'class' => BeforeLogin::class,
                'only' => ['login', 'index'], 
            ],
            'AfterLogin' =>
            [
                'class' => AfterLogin::class,
                'only' => ['logout','success'],
            ],   
        ];
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) 
        {
            return $this->redirect(['signup/login']);
        }
        return $this->render('signups', ['model' => $model]);
    }
       
    public function actionLogin()
    {   
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login())
        {               
            Yii::$app->session->set('isLoggedIn', true);
            return $this->redirect(['signup/success']);
        }
        return $this->render('logins', ['model' => $model]);
    }
    
    public function actionSuccess()
    {
        $this->layout = 'successlayout';
        return $this->render('success');
    }
 
    public function actionLogout()
    {   
        Yii::$app->session->destroy();
        return $this->redirect(['/']);
    }
    
    public function actionIndex()
    {   
        return $this->render('indexs');
    }

    public function actionAbout()
    {
        return $this->render('abouts');
    }

    public function actionProfile()
    {
        $this->layout = 'successlayout';
        return $this->render('profile');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        return $this->render('contacts', [
            'model' => $model,
        ]);
    }
}