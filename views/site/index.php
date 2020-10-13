<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'RoyalDoc';
$h = Url::base();


?>
<hr/>
<div class="site-index">
    <center>
        <h3><?=Yii::t('app', 'We make application easy')?></h3>
        <h4><?=Yii::t('app', 'All-in-one easy-to-use online application tools')?></h4>
    </center>
    <div class="container">
        <div class="row">
            <?php
            $prs = \app\models\Template::find()->all();
            foreach ($prs as $pr) {
                ?>
                <div class="col-sm-2 col-xs-6"><a href="#" class="btn btn-default" style="margin-top: 10px"><img
                                src="<?= Url::base(true) . '/' . $pr->icon ?>" width="120px"
                                height="120px"/><br/><?= \Yii::t('app', $pr->name_en) ?></a></div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Check Active -->
<?php

?>
