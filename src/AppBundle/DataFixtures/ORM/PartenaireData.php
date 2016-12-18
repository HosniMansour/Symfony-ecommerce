<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Partenaires;

class PartenaireData extends AbstractFixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {

        /* ========= Image Partenaire =========== */

        $p1 = new Partenaires();
        $p1->setNom("Air Case");
        $p1->setLien("#");
        $p1->setImage($this->getReference('img-air-case'));
        $manager->persist($p1);

        $p2 = new Partenaires();
        $p2->setNom("Case");
        $p2->setLien("#");
        $p2->setImage($this->getReference('img-case'));
        $manager->persist($p2);

        $p3 = new Partenaires();
        $p3->setNom("Deap");
        $p3->setLien("#");
        $p3->setImage($this->getReference('img-deap'));
        $manager->persist($p3);

        $p4 = new Partenaires();
        $p4->setNom("Soft Step");
        $p4->setLien("#");
        $p4->setImage($this->getReference('img-soft-step'));
        $manager->persist($p4);

        $p5 = new Partenaires();
        $p5->setNom("ITech");
        $p5->setLien("http://www.itechmedicaldivision.com/");
        $p5->setImage($this->getReference('img-iTech'));
        $manager->persist($p5);

        $p6 = new Partenaires();
        $p6->setNom("Pagani");
        $p6->setLien("#");
        $p6->setImage($this->getReference('img-pagani'));
        $manager->persist($p6);

        $manager->flush();
    }

    public function getOrder(){
        return 2;
    }

}