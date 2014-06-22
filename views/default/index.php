<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $user->search(),
    'type' => array(TbHtml::GRID_TYPE_HOVER,TbHtml::GRID_TYPE_BORDERED),
    'filter' => $user,
    'template' => "{items}",
    'columns' => array(
        array(
            'name' => 'u_id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'u_login',
            'header' => 'Login',
        ),
        array(
            'name' => 'u_mail',
            'header' => 'Mail',
        ),
        array(
            'name' => 'u_switch',
            'header' => 'Switch',
        ),
        array(
            'header' => 'Action',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'buttons'=> $buttons,
        )
    ),
)); ?>