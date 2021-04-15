<?php

namespace App\Controller;

use App\Repository\PaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    #[Route('/pays', name: 'pays')]
    public function index(PaysRepository $repo): Response
    {
        $pays = $repo->findAll();
        return $this->render('pays/pays.html.twig', [
            'pays' => $pays,
        ]);
    }
}
