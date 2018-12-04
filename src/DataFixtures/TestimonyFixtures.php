<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Testimony;

class TestimonyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        
        for ($i = 0; $i < 15; $i++) {
            $testimony = new Testimony();
            $testimony
                ->setAge($faker->numberBetween(17, 25))
                ->setContent($faker->text())
                ->setDate($faker->dateTimeThisDecade)
                ->setFirstName($faker->firstName)
                ->setName($faker->lastName)
                ->setPicture(null)
                ->setState($faker->jobTitle);
            $manager->persist($testimony);
        }
        $manager->flush();
    }
}
