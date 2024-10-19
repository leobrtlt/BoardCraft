<?php include('themes/boardcraft2/functions.php'); ?>
<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'Reset Password');
$this->breadcrumbs=array(
    Yii::t('mc', 'Reset Password'),
);

$this->menu=array(
    array(
        'label'=>Yii::t('mc', 'Back'),
        'url'=>array('site/login'),
        'icon'=>'back',
    ),
);
?>
<style>
.requestpswd-page{
position: fixed;
    z-index: 10000;
    left: 0;
    right: 0;
    bottom: 0;
    padding-left: 45em;
    padding-top: 10em;
    padding-right: 45em;
    top: 0;
    background: #007bff;
}
.requestpswd-page h6{
    text-align: center;
    color: white;
    font-size: 2em;
}
.requestpswd-page .form{
    background: white;
    padding: 2em;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 2px #0000005c;
}
</style>
<div class="col-md-12 col-md-offset-3 col-toppad requestpswd-page">
<?php if (Yii::app()->user->hasFlash('reset-success')): ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('reset-success'); ?>
</div>
<?php elseif (Yii::app()->user->hasFlash('reset-error')): ?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash('reset-error'); ?>
</div>
<?php elseif ($state =='info'): ?>
<div class="flash-error">
    <?php echo Yii::t('mc', 'Invalid request') ?>
</div>
<?php endif ?>

<?php if ($state =='info') return; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'reset-form',
    'enableAjaxValidation'=>false,
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton(Yii::t('mc', 'Send Reset Link')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>

</div>