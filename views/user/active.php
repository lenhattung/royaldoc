<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'KÍCH HOẠT TÀI KHOẢN';
$this->params['breadcrumbs'][] = $this->title;
$h = Url::base(true);
//echo $h;

$request = Yii::$app->request;
$mobile = "";
$code = "";
$id = $request->get('id');
$code = $request->get('code');
$user = \app\models\User::findOne(isset($id) ? $id : -1);
if (isset($user)) {
    $mobile = $user->mobilePhone;
}
?>
<script>
    function sendActive($th) {
        var id = document.getElementById("id").value;
        var code = document.getElementById("code").value;
        $.ajax(
            '<?=$h?>/user/send-active?id='+id+'&code='+code,
            {
                success: function (data) {
                    if(data=='error'){
                        alert('Mã xác thực không chính xác. Vui lòng kiểm tra lại mã xác thực.');
                    }else{
                        alert(data);
                        window.location = '<?=$h?>/site/login';
                    }
                },
                error: function (data) {
                    alert('There was some error performing the AJAX call!' + data);
                }
            }
        );
    }
    function resendVerifyRegister($th) {
        var id = document.getElementById("id").value;
        $.ajax(
            '<?=$h?>/sending/resend-verify-register?id='+id,
            {
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert('There was some error performing the AJAX call!' + data);
                }
            }
        );
    }
</script>
<div class="container text-center">
    <h3><?= Html::encode($this->title) ?></h3>
    <hr/>
    <form class="form" >
        <input type='hidden' id="id" name='id' value='<?= (isset($id) ? $id : -1) ?>'/>
        <div class="form-group row">
            <label for="mobile" class="col-sm-2 col-form-label">
                Số điện thoại: </label>
            <div class="col-sm-10">
                <input type='text' class="form-control" readonly='readonly' id="mobile" value='<?= $mobile ?>'/><br/>
            </div>
        </div>
        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">
                Nhập mã kích hoạt (vui lòng kiểm tra email hoặc số điện thoại của bạn): </label>
            <div class="col-sm-10">
                <input name='code' class="form-control"  id="code" type='text' value="<?=$code?>"/><br/>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <input type="button" class="btn btn-primary" onclick="sendActive(this)"  value="Kích hoạt tài khoản"/>
                    <input type="button" onclick="resendVerifyRegister(this)" class="btn btn-warning"  value="Lấy mã kích hoạt mới" id="<?=(isset($id) ? $id : -1) ?>"/>
                </div>
            </div>
    </form>
</div>
