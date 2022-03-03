<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservasUsuarioController extends AbstractController
{
    /**
     * @Route("/reservas/usuario", name="reservas_usuario")
     */
    public function index(): Response
    {
        return $this->render('reservas_usuario/index.html.twig', [
            'controller_name' => 'ReservasUsuarioController',
        ]);
    }
}
