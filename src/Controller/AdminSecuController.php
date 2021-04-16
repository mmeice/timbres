<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminSecuController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class,$utilisateur);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($utilisateur);
            $em->flush();
            return $this->redirectToRoute("timbres");
        }

        return $this->render('admin_secu/inscription.html.twig',[
            "form" => $form->createView()
        ]);
    }
}
