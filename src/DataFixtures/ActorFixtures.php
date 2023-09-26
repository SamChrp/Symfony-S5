<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
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
            $nationalites = [];
            foreach (range(1, rand(1,5)) as $j) {
                $nationalite = $this->getReference('nationalite_' . rand(1,5));
                if (!in_array($nationalite, $nationalites)) {
                    $nationalites[] = $actor;
                    $actor->setNationalite($nationalite);
                }
            }
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            NationaliteFixtures::class,
        ];
    }
}
