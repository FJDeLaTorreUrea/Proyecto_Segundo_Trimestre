<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OjeaHabitacionesController extends AbstractController
{
    /**
     * @Route("/ojea/habitaciones", name="ojea_habitaciones2")
     */



        










     
    public function index(): Response
    {
        $fechaActual=date("d-m");
        return $this->render('ojea_habitaciones/index.html.twig', [
            'fecha_actual' => $fechaActual,
        ]);
    }
}
