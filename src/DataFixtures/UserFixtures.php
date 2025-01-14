<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(protected UserPasswordHasherInterface $passwordHasher)
{
}
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('t@t.t');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'test'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
