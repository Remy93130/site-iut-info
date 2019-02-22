<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\PressReview;

class PressFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        
        for ($i = 0; $i < 9; $i++) {
            $press = new PressReview();
            $press
                ->setDescription($faker->monthName)
                ->setLien($faker->url)
            ;
            $manager->persist($press);
        }

        $manager->flush();
    }
}
