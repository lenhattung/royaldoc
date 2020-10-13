<?php

namespace app\controllers;

use app\models\User;
use yii\debug\panels\EventPanel;

class SendingController extends \yii\web\Controller
{

    private function sendMessage($type, $userId, $content)
    {
        $user = User::findOne($userId);
        if (isset($user)) {
            if ($type == 1) {//SMS

            } else if ($type == 2) { //Email
                if (isset($user->email)) {
                    $subject = "New messages from RoyalSK";
                    $email = $user->email;
                    $check = Yii::$app->mailer->compose()
                        ->setFrom("royalsk@gmail.com")->setHtmlBody($content)->setSubject($subject)->setTo($email)->send();
                    if ($check)
                        return "Message sent successfully!";
                    else
                        return "Message sent failed!";
                } else {
                    return "Account does not have an email address!";
                }
            } else if ($type == 3) { //Notify

            }
        } else {
            return "User does not exist!";
        }
    }

    public static function actionResendVerifyRegister($id){
        SendingController::sendVerifyRegister(2, $id);
        return "Đã gửi lại mã kích hoạt! Vui lòng kiểm tra email hoặc số điện thoại của bạn.";
    }

    public static function sendVerifyRegister($type, $userId)
    {
        $user = User::findOne($userId);
        if (isset($user)) {
            if ($type == 1) {//SMS

            } else if ($type == 2) { //Email
                if (isset($user->email)) {
                    $activeCode = $user->activeCode;
                    $content = '
                      <h2 style="text-align: left;">Cảm ơn bạn đ&atilde; đăng k&yacute; t&agrave;i khoản tại RoyalSK</h2>
                            <p>Đ&acirc;y l&agrave; m&atilde; x&aacute;c thực t&agrave;i khoản của bạn: <span
                                    style="color: #ff0000;"><strong>'.$activeCode.'</strong></span></p>
                            <p>Vui l&ograve;ng nhập v&agrave;o &ocirc; x&aacute;c thực để k&iacute;ch hoạt t&agrave;i khoản v&agrave; bắt đầu trải
                                nghiệm c&aacute;c chức năng của RoyalSK. (Hoặc nhấn v&agrave;o đường dẫn để x&aacute;c thực t&agrave;i khoản: <a
                                        href="http://192.168.8.109/SK/user/active?id='.$userId.'&code='.$activeCode.'"> kích hoạt tài khoản</a></p>
                            <p style="text-align: left;"><span style="color: #0000ff;"><strong>Team RoyalSK</strong></span></p>
                            <p style="text-align: left;"><span style="color: #000000;"><em><strong>[Đ&acirc;y l&agrave; email tự động, vui l&ograve;ng kh&ocirc;ng phản hồi email n&agrave;y]</strong></em></span>
                            </p>  
                    ';
                    $subject = "Xác thực tài khoản RoyalSK";
                    $email = $user->email;
                    $check = \Yii::$app->mailer->compose()
                        ->setFrom("royalsk@gmail.com")->setHtmlBody($content)->setSubject($subject)->setTo($email)->send();
                    if ($check)
                        return "Message sent successfully!";
                    else
                        return "Message sent failed!";
                } else {
                    return "Account does not have an email address!";
                }
            } else if ($type == 3) { //Notify

            }
        } else {
            return "User does not exist!";
        }
    }

    private function sendEmail($userId, $emailTo, $subject, $content)
    {
        return $this->render('index');
    }

    private function sendSMS($userId, $mobileNumber, $content)
    {
        return $this->render('index');
    }

    private function sendNotification($userId, $content)
    {
        return $this->render('index');
    }

}
