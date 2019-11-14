<?php

namespace App\EventSubscriber;

use App\Entity\Menu;
use App\Entity\MenuAction;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Security\Core\Security;

class MenuSubscriber implements EventSubscriberInterface
{
    private $security;
    private $em;

    public function __construct(Security $security , EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents:: PRE_NEW => [['onPreNew' , 20]],
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
            $this->em->flush($menuAction);
        }
    }
}
