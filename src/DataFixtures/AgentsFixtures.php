<?php

namespace App\DataFixtures;

use App\Entity\Agents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AgentsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // initialisation de l'objet Faker
        $faker = Faker::create('fr_FR');

        // agents creation
        $agents = [];
        for ($i = 0; $i < 20; $i++) {
            $agents[$i] = new Agents();
            $agents[$i]->setFirstName($faker->firstname())
                ->setLastName($faker->lastname())
                ->setBirthdate($faker->dateTimeBetween('-45 years', '-18 years'))
                ->setIdentificationId($faker->randomNumber(6, true))
                ->setNationality($faker->country)
            ;
            $manager->persist($agents[$i]);
        }

        $manager->flush();
    }
}
