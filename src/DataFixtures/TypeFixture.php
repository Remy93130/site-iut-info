<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Type;

class TypeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $types = ['Alternance', 'Stage'];

        foreach ($types as $data) {
            $type = new Type();
            $type->setName($data);
            $manager->persist($type);
        }

        $manager->flush();
    }
}
