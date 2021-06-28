<?php

namespace App\Controller\Admin;

use App\Entity\Countries;
use App\Entity\DatesPrices;
use App\Entity\Offers;
use App\Entity\Photos;
use App\Entity\Steps;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Eventyr');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Offres');
        yield MenuItem::linkToCrud('Offres', 'fab fa-buffer', Offers::class);
        yield MenuItem::linkToCrud('Etapes', 'fas fa-shoe-prints', Steps::class);
        yield MenuItem::linkToCrud('Date Prix', 'fas fa-dollar-sign', DatesPrices::class);
        yield MenuItem::linkToCrud('Photos', 'fas fa-image', Photos::class);
        yield MenuItem::linkToCrud('Pays', 'fas fa-globe', Countries::class);
        yield MenuItem::section('Ulilisateurs');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
    }
}
