<?php

namespace app\controllers;

use app\models\User;
use app\util\StringUtil;
use Yii;
use app\models\Register;
use app\models\RegisterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Register models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('register/create');
    }

    public function actionCreate()
    {
        //Check đồng ý với điều khoản
        $session = Yii::$app->session;
        if (!$session->isActive) $session->open();
        $check = $session['regulation_confirm'];
        if(!$check || $check!='OK'){
            return $this->redirect(['/regulation-confirmation']);
        }

        $model = new Register();

        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            $model->mobilePhone = trim(isset($model->mobilePhone)?$model->mobilePhone:"");
            $mobile=trim(isset($model->mobilePhone)?$model->mobilePhone:"");
            $user = User::find()->where('mobilePhone=\''.$mobile.'\'')->all();

            if (sizeof($user)>0){
                $model->note=Yii::t('app',  'This phone number is already registered, please <a href="../site/login"> login </a> or choose another phone number to sign up for an account!');
            }else {
                    $user = new User();
                    $user->password=sha1($model->password);
                    $user->firstName=$model->firstName;
                    $user->lastName=$model->lastName;
                    $user->dateOfBirth=$model->dateOfBirth;
                    $user->gender=$model->gender;
                    $user->address=$model->address;
                    $user->street=$model->street;
                    $user->city=$model->city;
                    $user->country=$model->country;
                    $user->postCode=$model->postCode;
                    $user->mobilePhone=$model->mobilePhone;
                    $user->phoneCountryCode=$model->phoneCountryCode;
                    $user->email=$model->email;
                    $user->note=$model->note;
                    $user->authKey=$model->authKey;
                    $user->activeCode=UserController::get6OTP();
                    $user->activeStatus="yes";
                    $user->registerTime=date("Y-m-d H:i:s", strtotime('now'));
                    $user->role="client";

                    $model->mobilePhone=StringUtil::removeMathCharacters($model->mobilePhone.'');
                    $user->username=trim($model->phoneCountryCode.'').trim($model->mobilePhone.'');
//                    if($user->save()){
//                        $user->refresh();
//                        SendingController::sendVerifyRegister(2, $user->id, $user->activeCode);
//                        return $this->redirect(['/user/active', 'id' => $user->id]);
//                    }
                    if($user->save()){
                        return $this->redirect(['/site/login', 'username' => $user->username]);
                    }
                    else
                        $model->note = 'Không thể tạo tài khoản mới!';

            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

}
