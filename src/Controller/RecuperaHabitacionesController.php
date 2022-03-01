<?php

namespace App\Controller;

use App\Entity\Fotos;
use App\Entity\Temporada;
use App\Entity\Habitacion;
use App\Entity\TipoHabitacion;
use App\Repository\FotosRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/habitaciones/todas/", name="habitaciones", methods={"GET"})
     */
    public function getAll(ManagerRegistry $doctrine,Request $request): Response
    {
        $request = Request::createFromGlobals();
        $fecha_inicio=$request->request->get('fecha_inicio');
        $fecha_fin=$request->request->get('fecha_fin');
        $pagina=$request->request->get('pagina');
    




        $entityM=$doctrine->getManager();


        $fotos=$doctrine->getRepository(Fotos::class)->obtenFotosPaginadas($pagina-0,4);
        $habitacion=$doctrine->getRepository(Habitacion::class)->obtenHabitacionesPaginados($pagina-0,4,$fecha_inicio,$fecha_fin);
        $habitacion_paginas=$doctrine->getRepository(Habitacion::class)->cuentaHabitaciones();
        $temporadas=$doctrine->getRepository(Temporada::class)->findAll();
        $tipos=$doctrine->getRepository(TipoHabitacion::class)->findAll();
        $contenido=[$fotos,$habitacion,$temporadas,$tipos,$habitacion_paginas];
        $encoder=new JsonEncoder;
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                
                
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return new Response($serializer->serialize($contenido, 'json'),);
        // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}

        

        

        
       
    }


    /**
     * @Route("/habitaciones/paginadas", name="habitacionesPag")
     */
    public function getAl(ManagerRegistry $doctrine): Response
    {








        $entityM=$doctrine->getManager();


        
        $habitacion=$doctrine->getRepository(Habitacion::class)->obtenHabitacionesPaginados(1,4);
        $habitacion_paginas=$doctrine->getRepository(Habitacion::class)->cuentaHabitaciones();
        $fotos=$doctrine->getRepository(Fotos::class)->obtenFotosPaginadas(1,4);
        $temporadas=$doctrine->getRepository(Temporada::class)->FindAll();
        $contenedor=[$habitacion,$fotos,$temporadas,$habitacion_paginas];

        
       
        return new Response(json_encode($contenedor));
        // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}

        

        

        
       
    }


}