<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animal", name="animal")
     */
    public function index(AnimalRepository $repository): Response
    {
        $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig',[
            "animaux" => $animaux,
        ]);

    }
    /**
     * @Route("/animal/{id}", name="afficher_animal")
     */
    public function afficherAnimal(AnimalRepository $repository,$id)
    {
        $unanimal = $repository->find($id);
        return $this->render('animal/afficheAnimal.html.twig',[
            "animal" => $unanimal  //le "animal" correspond au nom du tableau que l'on crée et que lon veut afficher dans la twig. ATTENTION à la CORRESPONDANCE
        ]);

    }

    /**
     * @Route("/animaux/{poids}", name="animauxLegers")
     */

     public function getAnimalleger(AnimalRepository $repository, $poids){

        
        $animaux = $repository->getAnimauxLegers($poids);
            return $this->render('animal/animauxLegers.html.twig',[
                "animauxLeger"=>$animaux
            ]);
        
     }
}

