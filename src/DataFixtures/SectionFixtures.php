<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SectionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fake = Factory::create('fr_FR');
        for($i=0;$i<10;$i++){
            $section = new Section();
            $section->setDesignation($fake->title);
            $manager->persist($section);
        }

        $manager->flush();
    }
}
