<?php
namespace app\filters;

use Yii;
use yii\base\ActionFilter;

class BeforeLogin extends ActionFilter
{
    public function beforeAction($action)
    {
        if (Yii::$app->session->get('isLoggedIn')) 
        {
            Yii::$app->getResponse()->redirect(['signup/success'])->send();
            return false;
        }
        return parent::beforeAction($action);
    }
}