<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$h = Url::base(true);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?php ActiveForm::end(); ?>

</div>
<hr/>
<div class="form-group row">
    <div class="col-sm-12 text-left">
        <a href="<?=$h?>/my-user/change-email" class="btn btn-default btn-block" style="margin-top: 10px; text-align: left"><?= Yii::t('app',  'Change your e-mail')?></a>
        <a href="<?=$h?>/my-user/change-password" class="btn btn-default btn-block" style="margin-top: 10px; text-align: left"><?= Yii::t('app',  'Change your password')?></a>
        <a href="<?=$h?>/my-user/request-delete-user" class="btn btn-default btn-block" style="margin-top: 10px; text-align: left"><?= Yii::t('app',  'Request delete your account')?></a>
    </div>
</div>
