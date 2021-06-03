<?php

use yii\bootstrap\Html;
use app\assets\ThemeAsset;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

ThemeAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <title>Home | E-Shopper</title> -->

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <?php $this->head() ?>
</head><!--/head-->

<body>

    <?php $this->beginBody() ?>
	
	
	<?= $this->render('header.php') ?>
   
    <?= $content ?>

    <?= $this->render('footer.php') ?>

	
	<?php $this->endBody() ?>
	
	
</body>
</html>
<?php $this->endPage() ?>