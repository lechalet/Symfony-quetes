<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface{

      
      public function load(ObjectManager $manager)
      {
            $faker = Faker\Factory::create('fr_FR');
            
            for ($i = 0; $i < 50; $i++)
            {
                  $season = new Season();
                  $season->setNumber($faker->randomDigit);
                  $season->setYear($faker->Year);
                  $season->setDescription($faker->text($maxNbChars = 200));          
                  $manager->persist($season);
                  $this->addReference('season_' . $i, $season);
                  $season->setPrograms($this->getReference('program_0'));
            }
      $manager->flush();
      }
      public function getDependencies()
      {  
            return [ProgramFixtures::class];  
      }
}
