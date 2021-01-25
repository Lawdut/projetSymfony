<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Continent;
use App\Entity\Personne;
use App\Entity\Dispose;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $p1 = new Personne () ;
        $p1->setNom('Jean');
        $manager->persist($p1);

        $p2 = new Personne () ;
        $p2->setNom('Claude');
        $manager->persist($p2);

        $p3 = new Personne () ;
        $p3->setNom('Pierre');
        $manager->persist($p3);

        $continent1=new Continent() ;
	    $continent1->setLibelle("Europe");
	    $manager->persist($continent1);

	    $continent2=new Continent() ;
	    $continent2->setLibelle("Afrique");
        $manager->persist($continent2);

        $continent3=new Continent() ;
	    $continent3->setLibelle("Oceanie");
        $manager->persist($continent3);
    

        $e1= new Espece();
        $e1->setLibelle("mammifere")->setDescription("nourrit avec du lait");
        $manager->persist($e1);

        $e2= new Espece();
        $e2->setLibelle("poisson")->setDescription("nourrit avec du plancton");
        $manager->persist($e2);

        //on crée les espèces puis on les ajoute aux animaux. Grâce au lien qui existe sur la table (espece_id)

        $a1= new Animal ();
        $a1->setColor('black')->setNom("Taureau")->setFamille("mamif")->setPoids(30)->setEspece($e1)->addContinent($continent1)->addContinent($continent3);
        $manager->persist($a1);

        $a2= new Animal ();
        $a2->setColor('gris')->setNom("Thon")->setFamille("mamif2")->setPoids(15)->setEspece($e2)->addContinent($continent2);
        $manager->persist($a2);

        $d1 = new Dispose () ;
        $d1->setPersonne($p1)->setAnimal($a1)->setNombre(10);
        $manager->persist($d1);

        $d2 = new Dispose () ;
        $d2->setPersonne($p2)->setAnimal($a1)->setNombre(20);
        $manager->persist($d2);

        $d3 = new Dispose () ;
        $d3->setPersonne($p3)->setAnimal($a2)->setNombre(10);
        $manager->persist($d3);

        $manager->flush();
    }
}
