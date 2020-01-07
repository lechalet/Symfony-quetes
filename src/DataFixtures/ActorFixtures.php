<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface{

      
      public function load(ObjectManager $manager)
      {
            $faker = Faker\Factory::create('fr_FR');

            for ($i = 0; $i < 50; $i++)
            {
                  $actor = new Actor();
                  $actor->setName($faker->name);            
                  $manager->persist($actor);     
            }
      $manager->flush();
      }
      public function getDependencies()
      {  
            return [ProgramFixtures::class];  
      }
}
