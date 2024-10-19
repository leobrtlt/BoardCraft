<?php include('themes/boardcraft2/functions.php'); ?>
<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'Register');
$this->breadcrumbs=array(
    Yii::t('mc', 'Register'),
);
include('themes/boardcraft2/functions.php');

$config = file_get_contents("themes/boardcraft2/config.json");
$json_config = json_decode($config);
?>

<div class="login-page" style="background: url(<?= $json_config->config->custombackground; ?>);background-size:cover;background-repeat: no-repeat;">
    <div class="login-page-content">
        <div class="col-md-12 col-md-offset-3 col-toppad">
            <h1><?php if(empty($specialname)){ echo CHtml::encode(Yii::app()->name); }else{ echo $specialname; } ?><br><small><?php if(empty($specialdesc)){ echo Yii::t('mc', 'Minecraft Server Manager'); }else{ echo $specialdesc; } ?></small></h1>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('autocomplete'=>'off'),
)); ?>

<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

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

    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

<br/>

<?php if(extension_loaded('gd')): ?>
<div class="simple">
        <?php echo $form->labelEx($model, 'verifyCode'); ?>
        <div>
        <?php $this->widget('CCaptcha'); ?><br/>
        <?php echo $form->textField($model, 'verifyCode'); ?>
        </div>
        <p class="hint"><?php echo Yii::t('mc', 'Please enter the letters as they are shown in the image above.') ?>
        <br/><?php echo Yii::t('mc', 'Letters are not case-sensitive.') ?></p>
</div>
<?php endif; ?>

<div class="action">
<?php echo CHtml::submitButton(Yii::t('mc', 'Register')); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>