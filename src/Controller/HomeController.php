<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VilleRepository;
use App\Repository\VolRepository;
use App\Repository\UserRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(VilleRepository $ville, VolRepository $vol): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'vol'=>$vol->findAll(),
            'ville' => $ville->findAll(),
        ]);
    }
}
