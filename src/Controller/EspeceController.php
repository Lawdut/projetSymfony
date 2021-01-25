<?php

namespace App\Controller;

use App\Entity\Espece;
use App\Repository\EspeceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspeceController extends AbstractController
{
    /**
     * @Route("/espece", name="espece")
     */
    public function index(EspeceRepository $repository): Response
    {
        $especes = $repository->findAll();
        return $this->render('espece/index.html.twig', [
            'especes' => $especes,
        ]);
    }

    /**
     * @Route("/espece/{id}", name="afficher_espece")
     */
    public function afficherespece(EspeceRepository $repository,$id)
    {
        $uneespece = $repository->find($id);
        return $this->render('espece/afficheespece.html.twig',[
            "espece" => $uneespece //le "espece" correspond au nom du tableau que l'on crée et que lon veut afficher dans la twig. ATTENTION à la CORRESPONDANCE
        ]);

    }
}
