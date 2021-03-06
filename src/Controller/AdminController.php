<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as EasyCorpAdminController;

class AdminController extends EasyCorpAdminController
{
    public function createNewUserEntity(){
        return $this->get('fos_user.user_manager')->createUser();
    }

    public function persistUserEntity($user){
        $this->get('fos_user.user_manager')->updateUser($user,false);
        parent::persistEntity($user);
    }

    public function updateUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
        parent::updateEntity($user);
    }
}
