<?php

class usersModuleController extends HqController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
   // public $hqLayout='/layouts/main';

    public function init()
    {
        //$this->pageTitle = "";
    }

    public function actions()
    {
        return array(
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {

        $this->hqRender('index',array('menu'=>"MENU"));
    }
}
