<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;


class AdminAnimalController extends AbstractController
{
    /*#[Route('/admin/animal/{id}', name: 'admin_animal')]
    public function modification(Animal $animal, Request $request, EntityManagerInterface $entityManager): Response
    {
        

        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($animal);
            $entityManager->flush();
            return $this->redirectToRoute('admin_animal');
        }
        return $this->render('admin_animal/index.html.twig', [
            "animal" => $animal,
            "form" => $form->createView()
        ]);
            
    }*/
    

    /**
     * @Route ("admin/animal/creation", name="admin_animal_modification")
     *  @Route ("admin/animal/{id}", name="admin_animal_modification")
     */
    public function ajoutModification(Animal $animal = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        
        if (!$animal) {
            $animal = new Animal();
        }

        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($animal);
            $entityManager->flush();
            return $this->redirectToRoute('animal');
        }
        return $this->render('admin_animal/index.html.twig', [
            "animal" => $animal,
            "form" => $form->createView()
        ]);
            
    }
}

