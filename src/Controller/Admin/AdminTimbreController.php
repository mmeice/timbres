<?php

namespace App\Controller\Admin;

use App\Repository\TimbreRepository;
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
}
