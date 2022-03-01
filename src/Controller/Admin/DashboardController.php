<?php

namespace App\Controller\Admin;

use App\Entity\Fotos;
use App\Entity\Reserva;
use App\Entity\Usuario;
use App\Entity\Temporada;
use App\Entity\Habitacion;
use App\Entity\Nacionalidad;
use App\Entity\TipoHabitacion;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ReservaCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ReservaCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
       /*  if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        } */

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hotel Royal Palace');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Inicio', 'fa fa-home');
        yield MenuItem::linkToCrud('Tipo', 'fa fa-star',TipoHabitacion::class);
        yield MenuItem::linkToCrud('Fotos', 'fa fa-camera',Fotos::class);
        yield MenuItem::linkToCrud('Habitacion', 'fa fa-bed',Habitacion::class);
        yield MenuItem::linkToCrud('Nacionalidad', 'fa fa-flag',Nacionalidad::class);
        yield MenuItem::linkToCrud('Reservas', 'fa fa-bell',Reserva::class);
        yield MenuItem::linkToCrud('Temporadas', 'fa fa-calendar',Temporada::class);
        yield MenuItem::linkToCrud('Usuarios', 'fa fa-users',Usuario::class);
    }
}
