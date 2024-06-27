<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>

<div class="site-login">
    <h1 style="color: blue"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>