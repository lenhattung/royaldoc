<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'userid',
            'fullName',
            'dateOfBirth',
            'gender',
            'mobilePhone',
            'email:email',
//            'codeAactiveMobileSMS',
//            'activeMobileSMS',
//            'codeActiveEmail:email',
//            'activeEmail:email',
//            'activeStatus',
//            'note',
//            'language',
            'relationship',
            [
                    'attribute' =>'avatar',
                    'format'=>'raw',
                    'value'=>function($model){
                        return Html::img(\yii\helpers\Url::base(true).'/upload/profile/avatar/'.$model->avatar, ['alt' => 'pic not found','width'=>'100px','height'=>'100px']);
                    }
            ]
        ],
    ]) ?>

</div>
