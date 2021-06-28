<?php

namespace App\Controller;

use App\Repository\OffersRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(OffersRepository $offers): Response
    {
        if($this->getUser() == null){
            return $this->redirectToRoute('app_register');
        }

        $themes = [
            [
                'nom' => 'EXTRÊME',
                'number' => '01',
                'image' => 'eventyr/assets/images/climbing-rappelling-rope-cliff-landscape-outdoors-recreation-rocks-sport 2.jpg',
                'route' => 'home/extreme',
            ],
            [
                'nom' => 'DÉCOUVERTE',
                'number' => '02',
                'image' => 'eventyr/assets/images/CC_Caballos-11 1.jpg',
                'route' => 'home/decouverte',
            ],
            [
                'nom' => 'INATTENDU',
                'number' => '03',
                'image' => 'eventyr/assets/images/365bcf11ef_76232_canonique-32 1.jpg',
                'route' => 'home/inattendu',
            ]
        ];

        $last4Offers = $offers->findLast4();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'themes' => $themes,
            'lastOffers' => $last4Offers
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
     * @Route("/home/{userid}/edit", name="mon_compte")
     */
    public function mon_compte($userid, UserRepository $userRepository): Response
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

