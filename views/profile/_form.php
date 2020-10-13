<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */

$rels = ArrayHelper::map((\app\models\Relationship::find()->orderBy('index')->all()), 'id', 'name');
foreach ($rels as $key => $value) {
    $rels[$key] = Yii::t('app', $value);
}

$genders =ArrayHelper::map((\app\models\Gender::find()->all()), 'id', 'name');
foreach ($genders as $key => $value) {
    $genders[$key] = Yii::t('app', $value);
}

?>
<style>
    h1:first-of-type {
        display: none;
    }
</style>
<div class="profile-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data'],
    ]); ?>

    <!--
    <?= $form->field($model, 'userid')->textInput() ?>
    -->

    <?= $form->field($model, 'relationship')->dropDownList(
        $rels,
        ['prompt'=>'']
    )?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateOfBirth')->textInput(['maxlength' => true, 'type'=>'date']) ?>

    <?= $form->field($model, 'gender')->dropDownList(
        $genders,
        ['prompt'=>'']
    )?>

    <?= $form->field($model, 'mobilePhone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!--

    <?= $form->field($model, 'codeAactiveMobileSMS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activeMobileSMS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codeActiveEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activeEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activeStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    -->
    <div class="center-block">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
