<?php

namespace App\DataFixtures;

use App\Entity\Pays;
use App\Entity\Timbre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PaysFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Pays();
        $p1->setNom("Belgique")
            ->setImage("be.png");
        $manager->persist($p1);

        $p2 = new Pays();
        $p2->setNom("Grande-Bretagne")
            ->setImage("gb.png");
        $manager->persist($p2);

        $p3 = new Pays();
        $p3->setNom("Hawaï")
            ->setImage("io.png");
        $manager->persist($p3);

        $p4 = new Pays();
        $p4->setNom("Autriche")
            ->setImage("at.png");
        $manager->persist($p4);

        $p5 = new Pays();
        $p5->setNom("Australie")
            ->setImage("au.png");
        $manager->persist($p5);

        $timbreRepository = $manager->getRepository(Timbre::class);

        $t1 = $timbreRepository->findOneBy(["nom" => "Termonde renversé"]);
        $t1->setPays($p1);
        $manager->persist($t1);

        $t2 = $timbreRepository->findOneBy(["nom" => "Penny black"]);
        $t2->setPays($p2);
        $manager->persist($t2);

        $t3 = $timbreRepository->findOneBy(["nom" => "Missionnaires d'Hawaï"]);
        $t3->setPays($p3);
        $manager->persist($t3);

        $t4 = $timbreRepository->findOneBy(["nom" => "Red Mercury"]);
        $t4->setPays($p4);
        $manager->persist($t4);

        $t5 = $timbreRepository->findOneBy(["nom" => "Black Swan inversé"]);
        $t5->setPays($p5);
        $manager->persist($t5);

        $manager->flush();
    }
}
