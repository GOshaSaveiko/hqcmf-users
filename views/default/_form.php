<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
)); ?>

<fieldset>

<?php echo $form->textFieldControlGroup($model,'u_login',
    array('label' => 'Login', 'placeholder' => 'Login', 'required' => true)); ?>

<?php echo $form->emailFieldControlGroup($model,'u_mail',
    array('label' => 'Email', 'placeholder' => 'my_mail@example.com', 'required' => true)); ?>

<?php echo $form->passwordFieldControlGroup($model,'u_pass',
    array('label' => 'Password', 'placeholder' => 'Password', 'required' => true)); ?>

<?php echo $form->passwordFieldControlGroup($model,'u_pass_repeat',
    array('label' => 'Repeat', 'placeholder' => 'Repeat Password', 'required' => true)); ?>

<?php echo $form->radioButtonListControlGroup($model,'u_switch',
    array(1=>'on',0=>'off'),
    array('label' => 'Switch', 'required' => true)); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord?'Submit':'Update', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

</fieldset>

<?php $this->endWidget(); ?>