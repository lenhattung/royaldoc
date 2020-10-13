<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
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
 * @property string|null $activeCode
 * @property string|null $activeStatus
 * @property string|null $registerTime
 * @property string|null $role
 * @property string|null $old_password
 * @property string|null $new_password
 * @property string|null $repeat_password
 * @property string|null $request_delete_time
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateOfBirth', 'registerTime', 'old_password', 'new_password', 'repeat_password', 'request_delete_time'], 'safe'],
            [['mobilePhone'], 'required'],
            [['note'], 'string'],
            [['username', 'gender', 'mobilePhone', 'phoneCountryCode', 'activeStatus', 'role', 'request_delete_time'], 'string', 'max' => 50],
            [['password', 'address', 'street', 'city', 'country', 'authKey', 'accessToken'], 'string', 'max' => 512],
            [['firstName', 'lastName', 'postCode', 'email', 'activeCode'], 'string', 'max' => 255],
            //Change pass
            [['old_password', 'new_password', 'repeat_password'], 'string', 'max' => 50, 'min' => 6],
            [['old_password', 'new_password', 'repeat_password'], 'required', 'on' => 'changePwd'],
            [['old_password'], 'findPasswords', 'on' => 'changePwd'],
            [['repeat_password'], 'compare', 'compareAttribute' => 'new_password', 'on' => 'changePwd'],
            //Request delete
            [['old_password'], 'required', 'on' => 'requestDelete'],
            [['old_password'], 'findPasswords', 'on' => 'requestDelete'],
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
            'activeCode' => Yii::t('app',  'Active Code'),
            'activeStatus' => Yii::t('app',  'Active Status'),
            'registerTime' => Yii::t('app',  'Register Time'),
            'role' => Yii::t('app',  'Role'),
            'old_password' => Yii::t('app',  'Old password'),
            'new_password' => Yii::t('app',  'New password'),
            'repeat_password' => Yii::t('app',  'Repeat new password'),

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
//            'email' => Yii::t('app',  'Email'),
//            'note' => Yii::t('app',  'Note'),
//            'authKey' => Yii::t('app',  'Auth Key'),
//            'accessToken' => Yii::t('app',  'Access Token'),
//            'activeCode' => Yii::t('app',  'Active Code'),
//            'activeStatus' => Yii::t('app',  'Active Status'),
//            'registerTime' => Yii::t('app',  'Register Time'),
//            'role' => Yii::t('app',  'Role'),
//            'old_password' => Yii::t('app',  'Mật khẩu cũ'),
//            'new_password' => Yii::t('app',  'Mật khẩu mới'),
//            'repeat_password' => Yii::t('app',  'Nhập lại mật khẩu mới'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = User::find()->where('id=\'' . $id . '\'')->one();
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where('accessToken=\'' . $token . '\'')->one();
        return $user;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()->where('username=\'%' . $username . '\'')->one();
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public function checkPassword($password)
    {
        return $this->password === sha1($password);
    }

    //matching the old password with your existing password.
    public function findPasswords($attribute, $params)
    {
        $user = User::findOne(Yii::$app->user->id);
        if ($user->password != sha1($this->old_password))
            $this->addError($attribute, 'Mật khẩu cũ không chính xác');
    }
}
