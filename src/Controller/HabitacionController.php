<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitacionController extends AbstractController
{
    /**
     * @Route("/habitacion", name="habitacion")
     */
    public function index(): Response
    {
        return $this->render('habitaciones/index.html.twig', [
            'controller_name' => 'HabitacionController',
        ]);
    }
}
