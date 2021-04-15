<?php

namespace App\Controller;

use App\Repository\TimbreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimbreController extends AbstractController
{
    #[Route('/', name: 'timbres')]
    public function index(TimbreRepository $repository): Response //injection de dépendance
    {
        $timbres = $repository->findAll();
        return $this->render('timbre/timbres.html.twig', [
            'timbres' => $timbres,
        ]);
    }
}
