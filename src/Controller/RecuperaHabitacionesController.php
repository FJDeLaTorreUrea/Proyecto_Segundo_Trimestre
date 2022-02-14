<?php

namespace App\Controller;

use App\Entity\Fotos;
use App\Entity\Habitacion;
use App\Repository\FotosRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecuperaHabitacionesController extends AbstractController
{
    /**
     * @Route("/habitaciones/todas", name="habitaciones", methods={"GET"})
     */
    public function getAll(ManagerRegistry $doctrine): Response
    {








        $entityM=$doctrine->getManager();


        $fotos=$doctrine->getRepository(Fotos::class)->findAll();
        $encoder=new JsonEncoder;
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getNHabitacion();
                
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return new Response($serializer->serialize($fotos, 'json'));
        // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}

        

        

        
       
    }
}