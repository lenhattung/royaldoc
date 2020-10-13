<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$this->registerJsFile(\yii\helpers\Url::base(true)."/web/js/app.js");
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
<!--    <style>-->
<!--        .navbar-toggle{-->
<!--            border-color: #0b72b8;-->
<!--            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(52, 104, 235, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");-->
<!--        }-->
<!--    </style>-->
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
//    Yii::$app->language = 'en';
//    $languageItem = new cetver\LanguageSelector\items\DropDownLanguageItem([
//        'languages' => [
//            'vn' => '<span class="flag-icon flag-icon-vn"></span> Vietnam',
//            'en' => '<span class="flag-icon flag-icon-us"></span> English',
//            'pl' => '<span class="flag-icon flag-icon-pl"></span> Polish',
//        ],
//        'options' => ['encode' => false],
//    ]);

    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-edit"></span> ' . Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top'
        ]
    ]);

    echo Nav::widget([
        'items' => [
            ['label' => Yii::t('app',  'Home page'), 'url' => ['/site/index']],
            ['label' => Yii::t('app',  'About'), 'url' => ['/site/about']],
            ['label' => Yii::t('app',  'Contact'), 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => Yii::t('app',  'Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
//            $languageItem->toArray(),
        ],
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
    ]);
        NavBar::end();
    ?>
    <div class="container">
        <p class="text-center"><?= $this->render('main/select-language') ?></p>
        <?php echo Alert::widget() ?>
        <?php echo $content ?>
    </div>
</div>

<!-- background-color: #dff0d8; -->
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; RoyalDoc Team <?= date('Y') ?>  </p>
        <p class="pull-right"> <a href="#">
                <span class="glyphicon glyphicon-qrcode" style="font-size: 15px;"></span>
            </a></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
