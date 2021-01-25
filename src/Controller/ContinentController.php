<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continent", name="continent")
     */
    public function index(ContinentRepository $repository): Response
    {   
        $continent = $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continent,
        ]);
    }
}
