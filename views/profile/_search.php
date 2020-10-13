<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'fullName') ?>

    <?= $form->field($model, 'dateOfBirth') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'mobilePhone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'codeAactiveMobileSMS') ?>

    <?php // echo $form->field($model, 'activeMobileSMS') ?>

    <?php // echo $form->field($model, 'codeActiveEmail') ?>

    <?php // echo $form->field($model, 'activeEmail') ?>

    <?php // echo $form->field($model, 'activeStatus') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'relationship') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
