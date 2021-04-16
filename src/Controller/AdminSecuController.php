<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminSecuController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class,$utilisateur);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $passwordCrypte = $encoder->encodePassword($utilisateur,$utilisateur->getPassword()); //chiffrement du pass grace à l'implémentation de l'interface utilisateur (Entity Utilisateur) 
            $utilisateur->setPassword($passwordCrypte); //le pass introduit par l'utilisateur est remplacé par celui qui revient chiffré
            $em->persist($utilisateur);
            $em->flush();
            return $this->redirectToRoute("timbres");
        }

        return $this->render('admin_secu/inscription.html.twig',[
            "form" => $form->createView()
        ]);
    }

    #[Route('/login', name: 'connexion')]
    public function login(AuthenticationUtils $util): Response //injection de AuthenticationUtils pour récupérer le message lors d'un mauvais login
    {
        return $this->render("admin_secu/login.html.twig",[
            "lastUserName" => $util->getLastUsername(),
            "error" => $util->getLastAuthenticationError()
        ]);
    }

    #[Route('/deconnexion', name: 'deconnexion')]
    public function deconnexion()
    {

    }
}
