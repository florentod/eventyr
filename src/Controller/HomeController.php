<?php

namespace App\Controller;

use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    

    /**
     * @Route("/home/{type}", name="offre")
     */
    public function offre($type, OffersRepository $offersRepository): Response
    {
        
$listOffers = $offersRepository->findBy(array('offer_type' => $type));

        return $this->render('home/offre.html.twig', [
            'controller_name' => 'HomeController',
            'listOffers' => $listOffers
        ]);
    }

    /**
     * @Route("/home/mon_compte", name="mon_compte")
     */
    public function mon_compte(): Response
    {
        return $this->render('home/mon_compte.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home/mon_aventure", name="mon_aventure")
     */
    public function mon_aventure(): Response
    {
        return $this->render('home/mon_aventure.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

