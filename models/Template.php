<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_vi
 * @property string|null $name_pl
 * @property string|null $icon
 * @property string|null $color_background
 * @property string|null $link
 * @property string|null $note
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_en', 'name_vi', 'name_pl'], 'string', 'max' => 255],
            [['icon', 'link', 'note'], 'string', 'max' => 512],
            [['color_background'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_vi' => Yii::t('app', 'Name Vi'),
            'name_pl' => Yii::t('app', 'Name Pl'),
            'icon' => Yii::t('app', 'Icon'),
            'color_background' => Yii::t('app', 'Color Background'),
            'link' => Yii::t('app', 'Link'),
            'note' => Yii::t('app', 'Note'),
        ];
    }
}
