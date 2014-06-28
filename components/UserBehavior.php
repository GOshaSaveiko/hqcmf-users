<?php
class UserBehavior extends CActiveRecordBehavior
{

    /**
     * Password hashing before model save.
     * @return bool
     */
    public function beforeSave($event)
    {
        $owner = $this->owner;
        if($owner->isNewRecord)
        {
            $owner->u_pass = $owner->hashPassword($owner->u_pass);
        }else{
            if(!empty($owner->u_pass))
            {
                $owner->u_pass = $owner->hashPassword($owner->u_pass);
            } else {
                unset($owner->u_pass);
            }
        }
    }

    /**
     * Role assignment after user add
     */
    public function afterSave($event)
    {
        $owner = $this->owner;
        foreach($owner->u_roles as $role_id) {
            $role = $owner->getInstanceRelation('userRoleRelations','create');
            $role->urr_u_id = $owner->u_id;
            $role->urr_ur_id = $role_id;
            $role->save();
        }
    }

    /**
     * Validates provided password
     * @return boolean
     */
    public function validatePassword($password)
    {
        $owner = $this->owner;
        return CPasswordHelper::verifyPassword($password,$owner->u_pass);
    }
    /**
     * Generate a secure hash from a password and a random salt.
     * @return string
     */
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

}