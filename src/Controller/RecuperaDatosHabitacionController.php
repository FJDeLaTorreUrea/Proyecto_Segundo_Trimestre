<?php

namespace App\Controller;

use App\Entity\Temporada;
use App\Entity\Habitacion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecuperaDatosHabitacionController extends AbstractController
{
    /**
     * @Route("/recupera/datos/habitacion/", name="recupera_datos_habitacion")
     */
    public function index(ManagerRegistry $doctrine,Request $request): Response
    {
        $request = Request::createFromGlobals();
        
        $id=$request->request->get('id');



        $entityM=$doctrine->getManager();


        
        $habitacion=$doctrine->getRepository(Habitacion::class)->find($id);
        $temporadas=$doctrine->getRepository(Temporada::class)->findAll();
        
        $contenido=[$habitacion,$temporadas];
        $encoder=new JsonEncoder;
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                
                
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return new Response($serializer->serialize($contenido, 'json'),);
}
}
