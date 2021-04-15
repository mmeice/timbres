<?php

namespace App\DataFixtures;

use App\Entity\Timbre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* $t1 = new Timbre();
        $t1->setNom("Penny black")
            ->setAnnee(1840)
            ->setImage("collection/onePenny.png")
            ->setValeur(3000);
        $manager->persist($t1);

        $t2 = new Timbre();
        $t2->setNom("Black Swan inversé")
            ->setAnnee(1983)
            ->setImage("collection/fourPence.png")
            ->setValeur(35500);
        $manager->persist($t2);

        $t3 = new Timbre();
        $t3->setNom("Red Mercury")
            ->setAnnee(1949)
            ->setImage("collection/Lucia.png")
            ->setValeur(37000);
        $manager->persist($t3);

        $t4 = new Timbre();
        $t4->setNom("Missionnaires d'Hawaï")
            ->setAnnee(1852)
            ->setImage("collection/Hawai.png")
            ->setValeur(39000);
        $manager->persist($t4);

        $t5 = new Timbre();
        $t5->setNom("Termonde renversé")
            ->setAnnee(1920)
            ->setImage("collection/Belgique.jpg")
            ->setValeur(75000);
        $manager->persist($t5);

        $manager->flush(); */
    }
}
