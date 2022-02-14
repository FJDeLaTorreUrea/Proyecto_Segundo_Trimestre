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
     * @Route("/reserva", name="reserva")
     */
    public function index(Request $request): Response
    {
        $reserva=new Reserva();
        $form=$this->createForm(ReservaType::class,$reserva);
        $form->handleRequest($request);










        return $this->render('reserva/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
