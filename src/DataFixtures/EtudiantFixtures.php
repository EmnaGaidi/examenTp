<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fake = Factory::create('fr_FR');
        for($i=0;$i<40;$i++){
            $etudiant = new Etudiant();
            $etudiant->setNom($fake->name);
            $etudiant->setPrenom($fake->firstName);
            if ($i%2==0){
                $repository = $manager->getRepository(Section::class);
                $random = rand(0,10);
                $section = $repository->findOneBy(['id'=>$random]);
                $etudiant->setSection($section);
            }
            $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
