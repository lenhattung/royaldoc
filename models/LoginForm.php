<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use function Symfony\Component\String\s;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app',  'Username'),
            'password' => Yii::t('app',  'Password'),
            'rememberMe' => Yii::t('app',  'Remember Me'),
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->checkPassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $rs =  Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            if ($rs&&$user->activeStatus=='not'){
                $h = Url::base();
                header( 'Location: '.$h.'/my-user/re-active');
                exit();
            }
            return $rs;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {

        $user = User::find()->where('username=\''.$this->username.'\'')->one();
        if(isset($user))
             return $user;


        $arrayuser = User::find()->where('username like \'%'.$this->username.'\'')->all();

        if(sizeof($arrayuser)>0) {
            foreach ($arrayuser as $userx) {
//                var_dump($userx);
                if (($this->username != $userx->username) && $this->checkPassword($userx->password)) {
                    $phoneCode = substr($userx->username, 0, strlen($userx->username) - strlen($this->username));
                    $country = Country::find()->all();
                    foreach ($country as $c) {
                        if ($c->international_dialing === $phoneCode) {
                            $this->username = $userx->username;
                            return $userx;
                        }
                    }
                } else  if (($this->username === $userx->username) && $this->checkPassword($userx->password)) {
                    return $userx;
                }
            }
            return null;
        }else{
            return null;
        }
    }

    public function checkPassword($password){
        return sha1($this->password) === $password;
    }
}
