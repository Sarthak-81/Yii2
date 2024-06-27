<?php
namespace app\filters;

use Yii;
use yii\base\ActionFilter;

class AfterLogin extends ActionFilter
{
    public function beforeAction($action) 
    {
        if(!Yii::$app->session->get('isLoggedIn'))
        {
            Yii::$app->getResponse()->redirect(['signup/login'])->send();
            return false;
        }
        return parent::beforeAction($action);
    }
}