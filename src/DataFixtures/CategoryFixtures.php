<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        foreach (range(1, 5) as $i) {
            $category = new Category();
            $category->setName('Category ' . $i);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
        }

        $manager->flush();

    }
}
