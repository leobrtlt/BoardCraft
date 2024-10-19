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

?>

<?php if (!strlen($l)): ?>
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
<div class="form">
<?php echo CHtml::beginForm() ?>

    <div class="row">
        <?php echo CHtml::label(Yii::t('mc', 'Token'), 'l') ?>
        <?php echo CHtml::textField('l', $l) ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('mc', 'Continue')); ?>
    </div>

<?php echo CHtml::endForm() ?>
</div>

<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'reset-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('autocomplete'=>'off'),
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'confirmPassword'); ?>
        <?php echo $form->passwordField($model,'confirmPassword'); ?>
        <?php echo $form->error($model,'confirmPassword'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::hiddenField('l', $l) ?>
        <?php echo CHtml::submitButton(Yii::t('mc', 'Reset Password')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>

<?php endif ?>
</div>