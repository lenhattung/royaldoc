<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-danger">
    <div class="panel-heading"><h4><?=Yii::t('app',  'Request delete your account')?></h4></div>
    <div class="panel-body">
        <h4><p style=" text-align: justify;"><?=Yii::t('app',  'Enter your password to confirm account deletion! You can cancel your account deletion request by re-signing in within 30 days of your confirmation.')?></p></h4>
        <div class="user-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => true, 'placeholder'=>'Input your password ...'])->label(false) ?>

            <div class="form-group">
                <p style="color: red"><?= isset($msg) ? $msg : "" ?></p>
                <?= Html::submitButton(Yii::t('app',  'Confirm'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>