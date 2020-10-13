<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $country_code
 * @property string|null $country_name
 * @property string|null $international_dialing
 * @property string|null $active
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'required'],
            [['country_code', 'international_dialing', 'active'], 'string', 'max' => 50],
            [['country_name'], 'string', 'max' => 255],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => Yii::t('app', 'Country Code'),
            'country_name' => Yii::t('app', 'Country Name'),
            'international_dialing' => Yii::t('app', 'International Dialing'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
