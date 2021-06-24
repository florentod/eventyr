<?php

namespace App\Controller;

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
     * @Route("/home/decouverte", name="decouverte")
     */
    public function decouverte(): Response
    {
        return $this->render('home/decouverte.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home/extreme", name="extreme")
     */
    public function extreme(): Response
    {
        return $this->render('home/extreme.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home/inattendu", name="inattendu")
     */
    public function inattendu(): Response
    {
        return $this->render('home/inattendu.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

