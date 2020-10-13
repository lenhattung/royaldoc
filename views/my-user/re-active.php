<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<h4><?= Yii::t('app',  'Your account is temporarily deactivated! Please confirm account reactivation.')?>.</h4>
<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly'=>true])?>
    <div class="form-group">
        <p style="color: red"><?=isset($msg)?$msg:""?></p>
        <?= Html::submitButton(Yii::t('app',  'Confirm'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<hr/>

