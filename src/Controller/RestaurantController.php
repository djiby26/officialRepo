<?php


namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class RestaurantController extends EasyAdminController
{
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null){
        $user = $this->getUser();

//        if($user->getRoles() === 'ROLE_SUPER_ADMIN'){
//            return 'bonjour';
//        }else{
            if (null === $dqlFilter) {
                $dqlFilter = sprintf('entity.administrateur = %s', $user);
            } else {
                $dqlFilter .= sprintf(' AND entity.user = %s', $this->getUser()->getId());
            }
//        }
        return parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
    }
}