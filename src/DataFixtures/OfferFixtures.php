<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Offer;
use App\Entity\Type;
use Faker\Factory;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        $types = ['Alternance', 'Stage'];
        
        foreach ($types as $data) {
            $type = new Type();
            $type->setName($data);
            $manager->persist($type);
        }
        
        $manager->flush();
        
        $typesManager = $manager->getRepository(Type::class);
        $types = $typesManager->findAll();

        for ($i = 0; $i < 20; $i++) {
            $offer = new Offer();
            $offer
                ->setTitle($faker->word)
                ->setOrganisation($faker->company)
                ->setType(($i % 2 == 0)? $types[0] : $types[1])
                ->setDuration($faker->numberBetween(10, 16) . " semaines")
                ->setDescription($faker->text())
                ->setLocation($faker->city);
            $manager->persist($offer);
        }
        $manager->flush();
    }
}
