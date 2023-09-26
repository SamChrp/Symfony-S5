<?php

namespace App\DataFixtures;

use App\Entity\Nationalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NationaliteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        foreach (range(1,5) as $i) {
            $nationalite = new Nationalite();
            $nationalite->setIntitule('Nationalite ' . $i);
            $manager->persist($nationalite);
            $this->addReference('nationalite_' . $i, $nationalite);
        }

        $manager->flush();
    }
}
