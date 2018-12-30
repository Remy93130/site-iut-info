<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Testimony;
use Faker\Factory;

class TestimonyFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $states = ['Etudiant', 'Employé'];
        $content = "# Interview";
        
        for ($i = 0; $i < 10; $i++) {
            $testimony = new Testimony();
            $testimony
                ->setName($faker->lastName)
                ->setFirstName($faker->firstName)
                ->setAge($faker->numberBetween(16, 25))
                ->setState(array_rand($states))
                ->setContent($content)
                ->setDate($faker->dateTimeThisDecade);
            $manager->persist($testimony);
        }
        $manager->flush();
    }
}

