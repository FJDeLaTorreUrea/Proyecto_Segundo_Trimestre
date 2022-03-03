<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AltaMasivaHabitacionesController extends AbstractController
{
    /**
     * @Route("/alta/masiva/habitaciones", name="alta_masiva_habitaciones")
     */
    public function index(): Response
    {
        return $this->render('alta_masiva_habitaciones/index.html.twig', [
            'controller_name' => 'AltaMasivaHabitacionesController',
        ]);
    }
}
