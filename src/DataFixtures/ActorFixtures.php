<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $firstNames = [
            'John',
            'Jane',
            'Jack',
            'Jill',
            'Jim',
            'Joan',
            'James',
            'Judy',
            'Joe',
            'Janet',
        ];

        $lastNames = [
            'Smith',
            'Doe',
            'Jones',
            'Davis',
            'Brown',
            'Johnson',
            'Williams',
            'Miller',
            'Wilson',
            'Moore',
        ];
        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($firstNames[rand(0,9)]);
            $actor->setLastName($lastNames[rand(0,9)]);
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }
}
