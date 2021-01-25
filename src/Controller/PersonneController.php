<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'personne')]
    public function index(PersonneRepository $repository): Response
    {
        $personnes = $repository->findAll();
        return $this->render('personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
    /*public function afficherpersonne(PersonneRepository $repository,$id)
    {
        $unepersonne = $repository->find($id);
        return $this->render('espece/afficheespece.html.twig',[
            "personne" => $unepersonne //le "espece" correspond au nom du tableau que l'on crée et que lon veut afficher dans la twig. ATTENTION à la CORRESPONDANCE
        ]);

    }*/
}
