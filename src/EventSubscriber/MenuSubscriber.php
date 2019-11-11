<?php

namespace App\EventSubscriber;

use App\Entity\Menu;
use App\Entity\MenuAction;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Security\Core\Security;

class MenuSubscriber implements EventSubscriberInterface
{
    private $security;


    public function __construct(Security $security)
    {
        $this->security = $security;

    }

    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents:: POST_NEW => ['onPreNew'],
        ];
    }

    public function onPreNew(GenericEvent $event){

        $entity = $event->getSubject();
        if($entity instanceof Menu){
            $user = $this->security->getUser();
            $username = $user->getUsername();
            $menuAction = new MenuAction();
            if(!$user instanceof User){
                return null;
            }
            $menuAction->setUsername($username);
        }
    }
}
