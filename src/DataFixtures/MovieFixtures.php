<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1, 10) as $i) {
            $movie = new Movie();
            $movie->setTitle('Movie ' . $i);
            $movie->setReleaseDate('25-09-23');
            $movie->setDescription('Description ' . $i);
            $movie->setDuration(60, 180);
            $movie->setCategory($this->getReference('category_' . rand(1,5)));
            $actors = [];
            foreach (range(1, rand(1,5)) as $j) {
                $actor = $this->getReference('actor_' . rand(1,10));
                if (!in_array($actor, $actors)) {
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }
            $movie->addActor($this->getReference('actor_' . rand(1,10)));
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
