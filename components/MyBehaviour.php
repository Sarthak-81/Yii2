<?php

namespace app\components;
use yii\base\Behavior;

class MyBehaviour extends Behavior{

    public function events(){
        echo "Custom behavior working";
        return [];
    }
}