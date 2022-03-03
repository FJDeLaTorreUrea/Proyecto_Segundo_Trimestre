<?php

namespace App\Controller;

use App\Entity\Reserva;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevuelveReservasController extends AbstractController
{
    /**
     * @Route("/devuelve/reservas", name="devuelve_reservas")
     */
    public function index(ManagerRegistry $doctrine,Request $request): Response
    {
        $entityM=$doctrine->getManager();
        $request = Request::createFromGlobals();
        $id=$request->request->get('id');

        $reservas=$doctrine->getRepository(Reserva::class)->devuelveReservasPorUsuario($id);

        
        $encoder=new JsonEncoder;
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                
                
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return new Response($serializer->serialize($reservas, 'json'));
    }
}
