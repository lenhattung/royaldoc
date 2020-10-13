<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $dateOfBirth
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $street
 * @property string|null $city
 * @property string|null $country
 * @property string|null $postCode
 * @property string $mobilePhone
 * @property string|null $phoneCountryCode
 * @property string|null $email
 * @property string|null $note
 * @property string|null $authKey
 * @property string|null $accessToken
// * @property string|null captcha
 */
class Register extends \yii\db\ActiveRecord
{

    public $captcha;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateOfBirth'], 'safe'],//, 'unique'
            [['mobilePhone', 'country', 'password'], 'required'],
//            [['captcha'], 'required'],
            //['captcha','captcha', 'captchaAction' => 'register/captcha', 'caseSensitive' => false],
            [['password'], 'string',  'min' =>6 , 'max' => 50],
            [['note'], 'string'],
            [['username', 'gender', 'mobilePhone', 'phoneCountryCode'], 'string', 'max' => 50],
            [['address', 'street', 'city', 'country', 'authKey', 'accessToken'], 'string', 'max' => 512],
            [['firstName', 'lastName', 'postCode', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app',  'ID'),
            'username' => Yii::t('app',  'Username'),
            'password' => Yii::t('app',  'Password'),
            'firstName' => Yii::t('app',  'First Name'),
            'lastName' => Yii::t('app',  'Last Name'),
            'dateOfBirth' => Yii::t('app',  'Date Of Birth'),
            'gender' => Yii::t('app',  'Gender'),
            'address' => Yii::t('app',  'Address'),
            'street' => Yii::t('app',  'Street'),
            'city' => Yii::t('app',  'City'),
            'country' => Yii::t('app',  'Country'),
            'postCode' => Yii::t('app',  'Post Code'),
            'mobilePhone' => Yii::t('app',  'Mobile Phone'),
            'phoneCountryCode' => Yii::t('app',  'Phone Country Code'),
            'email' => Yii::t('app',  'Email'),
            'note' => Yii::t('app',  'Note'),
            'authKey' => Yii::t('app',  'Auth Key'),
            'accessToken' => Yii::t('app',  'Access Token'),

//            'id' => Yii::t('app',  'ID'),
//            'username' => Yii::t('app',  'Tên tài khoản'),
//            'password' => Yii::t('app',  'Mật khẩu'),
//            'firstName' => Yii::t('app',  'Tên'),
//            'lastName' => Yii::t('app',  'Họ đệm'),
//            'dateOfBirth' => Yii::t('app',  'Ngày sinh'),
//            'gender' => Yii::t('app',  'Giới tính'),
//            'address' => Yii::t('app',  'Địa chỉ'),
//            'street' => Yii::t('app',  'Tên đường'),
//            'city' => Yii::t('app',  'Thành phố'),
//            'country' => Yii::t('app',  'Quốc gia'),
//            'postCode' => Yii::t('app',  'Mã bưu điện'),
//            'mobilePhone' => Yii::t('app',  'Số điện thoại'),
//            'phoneCountryCode' => Yii::t('app',  'Mã vùng'),
////            'captcha' => Yii::t('app',  'Mã xác nhận'),
//            'email' => Yii::t('app',  'Email'),
//            'note' => Yii::t('app',  'Note'),
//            'authKey' => Yii::t('app',  'Auth Key'),
//            'accessToken' => Yii::t('app',  'Access Token'),
        ];
    }
}
