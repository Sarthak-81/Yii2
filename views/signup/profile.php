<?php

/** @var yii\web\View $this */

$this->title = 'Profile';

$name = Yii::$app->session->get('name');
use yii\helpers\Html;

?>
<div class="site-about">

    <h1><?= Html::encode($name) ?></h1>

    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum labore autem ratione voluptates temporibus,
         repellendus natus vel, perspiciatis accusamus consequatur earum ex saepe asperiores commodi nobis expedita quo numquam molestias. 
    </p>

</div>

