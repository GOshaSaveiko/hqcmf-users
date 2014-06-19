<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10">
        <?php
            echo $content;
        ?>
        </div>
        <div class="span2">
        <?php
        $this->widget('bootstrap.widgets.TbNav',array(
            'htmlOptions'=>array('class'=>
                'nav-list',
            ),
            'items'=> $this->MenuList()
        ));
        ?>
</div>
    </div>
</div>