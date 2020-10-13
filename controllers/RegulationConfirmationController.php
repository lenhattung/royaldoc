<?php

namespace app\controllers;

class RegulationConfirmationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOK()
    {
        $session = \Yii::$app->session;
        if (!$session->isActive) $session->open();
        $session['regulation_confirm']='OK';
        return $this->redirect(['/register/create']);
    }

}
