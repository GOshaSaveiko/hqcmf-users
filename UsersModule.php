<?php
Yii::import('hqcmf.components.HqChildModule');

class UsersModule extends HqChildModule
{
    public $assets;

    public function init()
    {

        parent::init();
        $this->registerAssets();
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public function registerAssets()
    {
        $ad = Yii::getPathOfAlias('hqmodules.users.assets');
        $am = Yii::app()->assetManager;
        if(file_exists($ad))
        {
            $this->assets = $am->publish($ad);
        } else {
            $this->assets = null;
        }
    }
}

?>