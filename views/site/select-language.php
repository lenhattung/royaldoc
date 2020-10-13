<?php
use yii\bootstrap\Html;

    echo Html::a('<span class="flag-icon flag-icon-vn"></span> Việt Nam', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'vn']
    ));
    echo Html::a('<span class="flag-icon flag-icon-pl"></span> Polski', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'pl']
    ));
    echo Html::a('<span class="flag-icon flag-icon-us"></span> English', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
?>
