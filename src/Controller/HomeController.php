<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    //A Rajouter pour accesder a la page du site rajouter la Route '/'
    #[Route('/')]
    #[Route('/home', name: 'home')]
    public function index(CarouselRepository $carouselRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'carousels' => $carouselRepository->findAll()
        ]);
    }
}
