<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Form\ReservaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservaController extends AbstractController
{
    /**
     * @Route("/reserva/{id}/{fecha_inicio}/{fecha_fin}", name="reserva")
     */
    public function index(Request $request,$id): Response
    {
        echo $id;
        $reserva=new Reserva();
        $form=$this->createForm(ReservaType::class,$reserva);
        $form->handleRequest($request);










        return $this->render('reserva/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
