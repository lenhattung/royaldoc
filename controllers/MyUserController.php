<?php

namespace app\controllers;

use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;
use yii\helpers\Url;

class MyUserController extends \yii\web\Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'change-email', 'change-password', 'request-delete-user', 're-active'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = User::findOne(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionDeleteMyAccount(){

    }

    public function actionChangeEmail(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = User::findOne(Yii::$app->user->id);

        $msg = "";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = Yii::t('app',  'Your email has been updated successfully');
        }

        return $this->render('change-email', [
            'model' => $model,
            'msg' =>$msg
        ]);
    }

    public function actionChangePassword()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = User::findOne(Yii::$app->user->id);
        $model->setScenario('changePwd');

        $msg = "";

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();

            if($valid){
                $model->password = sha1($model->new_password);
                $model->setScenario('default');
                $model->new_password="";
                $model->old_password="";
                $model->repeat_password="";
                if($model->save())
                    $msg = Yii::t('app',  'Your password has been changed successfully');
                else
                    $msg = Yii::t('app',  'Your password change failed');
            }
        }

        return $this->render('change-password', [
            'model' => $model,
            'msg' =>$msg
        ]);
    }

    public function actionRequestDeleteUser()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = User::findOne(Yii::$app->user->id);
        $model->setScenario('requestDelete');

        $msg = "";

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();

            if($valid){
                $model->request_delete_time =  date("Y-m-d H:i:s", strtotime('now'));
                $model->activeStatus='not';
                if($model->save())
                    $msg = Yii::t('app',  'Please log out! Your account is temporarily deactivated, after 30 days (if you are not logged into RoyalSK) your data will be completely deleted from the system.');
                else
                    $msg = Yii::t('app',  'Your account cannot be deleted, please contact support!');
            }
        }

        return $this->render('request-delete-user', [
            'model' => $model,
            'msg' =>$msg
        ]);
    }

    public function actionReActive()
    {
        $h = Url::base();

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = User::findOne(Yii::$app->user->id);

        $msg = "";

        if($model->activeStatus=='not')
            $msg = Yii::t('app',  'Your account has been deactivated since:').$model->request_delete_time;

        if ($model->load(Yii::$app->request->post())&&$model->activeStatus=='not') {
            $valid = $model->validate();
            if($valid){
                $model->request_delete_time =  '';
                $model->activeStatus='yes';
                if($model->save())
                    $msg = Yii::t('app',  'Your account has been activated!').' <a href=\''.$h.'/site/index\'>'.Yii::t('app',  'Go to home page').'</a>';
                else
                    $msg = Yii::t('app',  'Your account cannot be reactivated!');
            }
        }

        return $this->render('re-active', [
            'model' => $model,
            'msg' =>$msg
        ]);
    }
}
