<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecuperaDatosHabitacionController extends AbstractController
{
    /**
     * @Route("/recupera/datos/habitacion/{id}", name="recupera_datos_habitacion")
     */
    public function index($id): Response
    {
        return $this->render('recupera_datos_habitacion/index.html.twig', [
            'controller_name' => 'RecuperaDatosHabitacionController',
        ]);
    }
}
