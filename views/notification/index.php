<?php
/* @var $this yii\web\View */
?>
<p>
    <?php
        if(isset($msg))
            echo \yii\bootstrap\Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => $msg,
            ]);
    ?>
</p>

