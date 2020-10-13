<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <p style="color: red"><?=isset($msg)?$msg:""?></p>
        <?= Html::submitButton(Yii::t('app',  'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<hr/>

