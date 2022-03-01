<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatosPersonalesController extends AbstractController
{
    /**
     * @Route("/perfil/datos/personales", name="datos_personales")
     */
    public function index(): Response
    {
        return $this->render('datos_personales/index.html.twig');
    }
}
