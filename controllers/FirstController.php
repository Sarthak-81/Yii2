<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\MyBehaviour;


class FirstController extends Controller
{   
    public function behaviors()
    {
        return [
            MyBehaviour::className(),
         ];
    }   

    public function actionComponent(){
        echo Yii::$app->commons->getToken();
        echo "Component";
    }
    public function actionPrint(){
        echo"Working";
    }

    public function actionIndex(){
        $data = Yii::$app->db->createCommand("select * from user_details")->queryAll();
        echo "<pre>"; 
        print_r($data); die;
    }

}