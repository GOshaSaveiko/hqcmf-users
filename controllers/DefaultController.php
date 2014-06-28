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
            (Hqh::ca('users.canAdd')? array('label'=>Hqh::mt('Add user'),'url'=>$this->createUrl('/hqcmf/users/create')):""),
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new UserModel('create');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['UserModel']))
        {
            $model->attributes=$_POST['UserModel'];

            if($model->save())
            {
                Yii::app()->user->setFlash('add_ok',Hqh::mt('User %u added to database',array('%u'=>$model->u_login)));
                $this->redirect(array('view','id'=>$model->u_id));
            } else {
                $model->u_pass = $model->u_pass_repeat;
                Yii::app()->user->setFlash('add_err',Hqh::mt('Can`t add user to database'));
            }
        }

        $this->hqrender('create',array(
            'model'=>$model,
            'roles'=>$model->getRolesList()
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $model = $this->loadModel($id);

        if(!Yii::app()->user->checkAccess('core.canDelete')  && Yii::app()->user->id !== $id)
            throw new CHttpException(403, 'Forbidden');

        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=UserModel::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs ajax validation of user
     * @param $model
     */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
