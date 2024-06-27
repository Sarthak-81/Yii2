<?php

/** @var yii\web\View $this */

$this->title = 'Success';
$name = Yii::$app->session->get('name');
?>

<body style="background-color: wheat">
    
<div class="site-about">

<h1 style="color: red">WELCOME</h1>

<h3 style="color: green;">

Congratulations <?= $name ?>, you've successfully logged in.    
</h3> 

</div>

</body>

