<?php

namespace App\Controller\Admin;

use App\Entity\Pays;
use App\Form\PaysType;
use App\Repository\PaysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaysController extends AbstractController
{
    #[Route('/admin/pays', name: 'admin_pays')]
    public function index(PaysRepository $repo): Response
    {
        $pays = $repo->findAll();
        return $this->render('admin/pays/adminPays.html.twig',[
            "pays" => $pays,
        ]);
    }

    #[Route('/admin/pays/create', name: 'ajout_pays')]
    #[Route('/admin/pays/{id}', name: 'modif_pays', methods:['GET','POST'])]
    public function ajoutEtModif(Pays $pays = null, Request $request, EntityManagerInterface $em): Response //parameter converter , Request pour récupérer la demande de validation provenant du navigateur 
    {  
        if(!$pays){
            $pays = new Pays();
        }
        
        $form = $this->createForm(PaysType::class, $pays);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($pays);
            $em->flush();
            $this->addFlash('success', "L'action a été réalisée");
            return $this->redirectToRoute("admin_pays");
        }

        return $this->render('admin/pays/modifEtAjout.html.twig',[
            "pays" => $pays,
            "form" => $form->createView()
        ]);
    }

    #[Route('/admin/pays/{id}', name: 'sup_pays', methods:['delete'])]
    public function suppression(Pays $pays, EntityManagerInterface $em, Request $request): Response
    {
        if($this->isCsrfTokenValid('SUP'.$pays->getId(), $request->get('_token'))){
            $em->remove($pays);
            $em->flush();
            $this->addFlash('success',"L'action a été réalisée");
            return $this->redirectToRoute("admin_pays");
        }
    }
}
