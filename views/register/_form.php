<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\Gender;

/* @var $this yii\web\View */
/* @var $model app\models\Register */
/* @var $form yii\widgets\ActiveForm */

$datasetCountry = Country::find()->where('active=\'x\'')->all();

$listDataCountry = ArrayHelper::map($datasetCountry, 'country_code', 'country_name');

$datasetGender = Gender::find()->all();

$listDataGender = ArrayHelper::map($datasetGender, 'id', 'name');

$h = \yii\helpers\Url::base(true);

?>
<style>
    h1:first-of-type {
        display: none;
    }
</style>
<div class="register-form">
    <h3 style="text-align: center"><?=Yii::t('app',  'REGISTER A NEW ACCOUNT')?></h3>
    <h4 style="color:red;text-align: center"><?php echo isset($model->note) ? $model->note : "" ?></h4>
    <hr/>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <?= $form->field($model, 'country')->dropDownList($listDataCountry, [
                        'onchange'=>'$("#register-phonecountrycode").val((getPhoneCode($("#register-country").val())));'
                    ]) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <?= $form->field($model, 'phoneCountryCode')->textInput(['maxlength' => true, 'readonly' => true, 'style' => 'text-align:center', 'value' => '+48']) ?>
                </div>
                <div class="col-md-8 mb-3">
                    <?= $form->field($model, 'mobilePhone')->textInput(['maxlength' => true, 'type' => 'number']) ?>
                </div>
            </div>

            <?php // echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true])?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app',  'Register a new account').' &raquo', ['class' => 'btn btn-success btn-block']) ?>
                    </div>
                </div>
            </div>

        </div>
        <!--
        <div class="col-lg-8">

            <h4 style="color:blue;">Thông tin không bắt buộc: </h4>
            <hr/>
            <div class="row">

                <div class="col-lg-6">

                    <?= $form->field($model, 'gender')->dropDownList($listDataGender, [
            'onchange' => ''
        ]) ?>

                    <?= $form->field($model, 'dateOfBirth')->textInput(['maxlength' => true, 'type' => 'date']) ?>

                    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>



                </div>

                <div class="col-lg-6">

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'postCode')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(), [
        ]) ?>
                    -->


    </div>
    <!--

            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>
                -->
</div>

<?php ActiveForm::end(); ?>

</div>
</div>