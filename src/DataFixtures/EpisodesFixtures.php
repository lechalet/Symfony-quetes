<?php
namespace App\DataFixtures;

use App\Entity\Episodes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++)
        {
            $episodes = new Episodes();
            $episodes->setTitle($faker->domainWord);
            $episodes->setNumber($faker->randomDigit);
            $episodes->setSummary($faker->text);
            $manager->persist($episodes);
            $this->addReference('episode_' . $i, $episodes);
            $episodes->setSeason($this->getReference('season_0'));
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}





