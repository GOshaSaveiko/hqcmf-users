<?php

class DefaultController extends HqController
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

    public function menuList()
    {
        return array(
            array('label'=>Hqh::mt('USERS MENU')),
            (Hqh::ca('users.canList')? array('label'=>Hqh::mt('List users'),'url'=>$this->createUrl('/hqcmf/users/index')):""),
            (Hqh::ca('users.canAdd')? array('label'=>Hqh::mt('Add user'),'url'=>$this->createUrl('/hqcmf/users/add')):""),
        );
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

        $user = new UserModel();

        $buttons = array(
            'view'=>array(
                'visible' => 'Yii::app()->user->checkAccess("users.canView")',
            ),
            'update'=>array(
                'visible' => 'Yii::app()->user->checkAccess("users.canUpdate")',
            ),
            'delete'=>array(
                'visible' => 'Yii::app()->user->checkAccess("users.canDelete") && Yii::app()->user->id !== $data->u_id',
            )
        );

        $this->hqrender('index',array(
            'user'=>$user,'buttons'=>$buttons
        ));
    }

    public function actionTest()
    {

        $this->hqRender('index',array('menu'=>"MENU"));
    }
}
