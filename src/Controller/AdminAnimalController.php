<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class AdminAnimalController extends AbstractController
{
    #[Route('/admin/animal/{id}', name: 'admin_animal')]
    public function modification(Animal $animal, Request $request, EntityManager $entityManager): Response
    {
        $form = $this->createForm(AnimalType::class);
        return $this->render('admin_animal/index.html.twig', [
            'animal' => $animal,"monform" =>$form->createView()
        ]);
    }

    

}

