<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Query\Expr\Func;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    // ====================================================== //
    // ===================PROPRIETER==========================//
    // ====================================================== //
    private $encoder;
    // ====================================================== //
    // ===================CONSTRUCTEUR==========================//
    // ====================================================== //
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface )
    {
        $this->encoder = $userPasswordHasherInterface;
    }

    // ====================================================== //
    // ===================METHODES==========================//
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstname("Alexandre");
        $user->setName("Champ");
        $user->setEmail("champouret@laposte.net");
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $password = $this->encoder->hashPassword($user, "pass");
        $user->setPassword($password);
        $user->setIsVerified(true);
        $manager->persist($user);
        //
        $user = new User();
        $user->setFirstname("lalala");
        $user->setName("Chalalmp");
        $user->setEmail("test@test.com");
        $user->setRoles(['ROLE_USER']);
        $password = $this->encoder->hashPassword($user, "pass");
        $user->setPassword($password);
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }
}
