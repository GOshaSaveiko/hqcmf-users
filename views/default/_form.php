<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'id'=>'users-form',
    'enableAjaxValidation'=>false,
)); ?>

<?php echo TbHtml::textFieldControlGroup('u_login', '',
    array('label' => 'Login', 'placeholder' => 'Login', 'required' => true)); ?>

<?php echo TbHtml::emailFieldControlGroup('u_mail', '',
    array('label' => 'Email', 'placeholder' => 'my_mail@example.com', 'required' => true)); ?>

<?php echo TbHtml::passwordFieldControlGroup('u_pass', '',
    array('label' => 'Password', 'placeholder' => 'Password', 'required' => true)); ?>

<?php echo TbHtml::passwordFieldControlGroup('u_pass_repeat', '',
    array('label' => 'Repeat', 'placeholder' => 'Repeat Password', 'required' => true)); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>