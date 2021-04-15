<?php

namespace App\Controller\Admin;

use App\Entity\Timbre;
use App\Form\TimbreType;
use App\Repository\TimbreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTimbreController extends AbstractController
{
    #[Route('/admin/timbres', name: 'admin_timbres')]
    public function index(TimbreRepository $repository): Response
    {
        $timbres = $repository->findAll();
        return $this->render('admin/admin_timbre/adminTimbre.html.twig', [
            'timbres' => $timbres,
        ]);
    }

    #[Route('/admin/timbres/creation', name: 'admin_timbres_creation')]
    #[Route('/admin/timbres/{id}', name: 'admin_timbres_modification')]
    public function AjoutEtModif(Timbre $timbre = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$timbre) {
            $timbre = new Timbre();
        }
        
        $form = $this->createForm(TimbreType::class,$timbre); //theme form = bootstrap -> config/packages/twig.yaml

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($timbre);
            $entityManager->flush();
            return $this->redirectToRoute("admin_timbres");

        }

        return $this->render('admin/admin_timbre/modifEtAjout.html.twig', [
            'timbres' => $timbre,
            "form" => $form->createView(),
            "isModification" => $timbre->getId() !== null //$timbre->getId() si n'existe pas = true | si existe = false -> timbre->getId() n'existe pas sur l'ajout
        ]);
    }
}