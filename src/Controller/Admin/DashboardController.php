<?php

namespace App\Controller\Admin;

use App\Entity\Boxs;
use App\Entity\Categories;
use App\Entity\Ingredients;
use App\Entity\Partenaires;
use App\Entity\Utilisateur;
use App\Entity\VillesLivrables;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator as RouterAdminUrlGenerator;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        $routeBuilder = $this->container->get(RouterAdminUrlGenerator::class);
        $url = $routeBuilder->setController(BoxsCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Brunchs De Bob Et Tintin');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Boxs', 'fa-solid fa-plate-wheat', Boxs::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Categories', 'fa-solid fa-list', Categories::class);
        yield MenuItem::linkToCrud('Ingredients', 'fa-solid fa-plate-wheat', Ingredients::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa-solid fa-user-group', Partenaires::class);
        yield MenuItem::linkToCrud('Zone de livraison', 'fa-solid fa-city', VillesLivrables::class);

    }
}
