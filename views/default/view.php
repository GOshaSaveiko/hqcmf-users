<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => array(TbHtml::GRID_TYPE_HOVER,TbHtml::GRID_TYPE_BORDERED),
    'data'=>$model,
    'attributes'=>array(
        'u_id',
        'u_login',
        'u_mail',
        'u_switch',
        array('name'=>'Roles','type'=>'raw','value'=>implode(", ",$roles)),
        //  array('name'=>'Actions','type'=>'raw','value'=>$this->widget('bootstrap.widgets.TbButtonColumn',
        //array('buttons'=>$buttons))),
    )
));