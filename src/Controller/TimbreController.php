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
            'isAnnee' => false,
            'isValeur' => false
        ]);
    }

    #[Route('/timbres/annee/{annee}', name: 'timbresAvantDate')]
    public function timbresAvant(TimbreRepository $repository, $annee): Response
    {
        $timbres = $repository->getTimbreParPropriete('annee','<',$annee);
        return $this->render('timbre/timbres.html.twig', [
            'timbres' => $timbres,
            'isAnnee' => true,
            'isValeur' => false
        ]);
    }

    #[Route('/timbres/valeur/{valeur}', name: 'timbresValeurMax')]
    public function timbresValeurMax(TimbreRepository $repository, $valeur): Response
    {
        $timbres = $repository->getTimbreParPropriete('valeur','<',$valeur);
        return $this->render('timbre/timbres.html.twig', [
            'timbres' => $timbres,
            'isAnnee' => false,
            'isValeur' => true
        ]);
    }

}
