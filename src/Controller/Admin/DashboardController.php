<?php

namespace App\Controller\Admin;

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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Eventyr');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Offres', 'fas fa-list', Offers::class);
        return [
    MenuItem::subMenu('Blog', 'fa fa-article')->setSubItems([

        yield MenuItem::linkToCrud('Dates et prix', 'fas fa-list', DatesPrices::class),
        yield MenuItem::linkToCrud('Photos', 'fas fa-list', Photos::class),
        yield MenuItem::linkToCrud('Etapes', 'fas fa-list', Steps::class),
    ])
];
    }
}
