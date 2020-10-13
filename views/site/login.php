<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app',  'Đăng nhập');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login text-center">
    <h3><?=Yii::t('app',  'Login')?></h3>
    <hr/>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            // 'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'type' => 'number'])?>

    <?= $form->field($model, 'password')->passwordInput()?>

    <?= $form->field($model, 'rememberMe')->checkbox([
//        'template' => "<div class=\"col-lg-offset-1 col-lg-4\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])?>

    <hr/>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <?= Html::submitButton(Yii::t('app',  'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <br/>
            <p style="padding-top: 10px">
            <a href="#"><?=Yii::t('app',  'Forgot password?')?></a>
            </p>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <!--
    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
    -->
</div>
