<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: beige;">
<?php $this->beginBody() ?>

<header id="header">

<?php
$name = Yii::$app->session->get('name');
NavBar::begin([
  'brandLabel' => 'Yii',
  'brandUrl' => ['index.php/signup/index'],
  'options' => [
      'class' => 'navbar navbar-expand-lg navbar-dark bg-dark',
  ],
]);

$menuItems = [
  ['label'=> $name, 'url'=> ['signup/profile']],
  ['label'=> 'Logout', 'url' => ['signup/logout']],
];

echo Nav::widget([
  'options' => ['class' => 'navbar-nav'],
  'items' => $menuItems,
]);

NavBar::end();
?>

</header>

<main id="main">
    <div class="container">
        <?= $content ?>
    </div>
</main>

<footer style="margin-top: 250px;" id="footer">
    <div style="border-radius: 2px;" class="container">
        <p style="font-size: 30px;">Powered by Yii</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>