<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class User extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $users = array(
            array(
                'email' => 'root@jeu-coca-cola.fr',
                'username' => 'root',
                'password' => '1234',
                'phoneNumber' => '43567890',
                'roles' => ['ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN'],
            ),
            array(
                'email' => 'admin@jeu-coca-cola.fr',
                'username' => 'admin',
                'password' => '1234',
                'phoneNumber' => '43567890',
                'roles' => ['ROLE_USER', 'ROLE_ADMIN'],
            ),
            array(
                'email' => 'laurent.bientz@wandi.fr',
                'username' => 'aly',
                'password' => '1234',
                'phoneNumber' => '43567890',
                'roles' => ['ROLE_USER'],
            ),
        );

        foreach($users as $userInfos){

            // fos specific
            $user = $userManager->createUser();
            $user->setUsername((array_key_exists('username', $userInfos) && !empty($userInfos['username'])) ? $userInfos['username'] : $userInfos['email']);
            $user->setEnabled(true);
            foreach($userInfos['roles'] as $role) {
                $user->addRole($role);
            }
            #$user->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
            $password = (array_key_exists('password', $userInfos) && !empty($userInfos['password'])) ? $userInfos['password'] : $this->generatePassword(mt_rand(8,14));
            $user->setPlainPassword($password);

            $user->setLastname($userInfos['lastname']);
            $user->setFirstname($userInfos['firstname']);
            $user->setEmail($userInfos['email']);

            // fos specific
            $userManager->updateUser($user);

            $em->persist($user);
        }

        $em->flush();
    }
}
