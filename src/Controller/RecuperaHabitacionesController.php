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
     * @Route("/habitaciones/todas/", name="habitaciones")
     */
    public function getAll(ManagerRegistry $doctrine,Request $request): Response
    {
        $request = Request::createFromGlobals();
        $fecha_inicio=$request->request->get('fecha_inicio');
        $fecha_fin=$request->request->get('fecha_fin');
        $adultos=$request->request->get('adultos');
        $menores=$request->request->get('menores');
        $tipo=$request->request->get('tipo');
        

        

        $pagina=$request->request->get('pagina');
        //dd($request->request->get('pagina'));




        $entityM=$doctrine->getManager();


        
        $habitacion=$doctrine->getRepository(Habitacion::class)->obtenHabitacionesPaginados(1,4, $fecha_inicio  ,   $fecha_fin, $adultos,$menores,$tipo);
        $habitacion_paginas=$doctrine->getRepository(Habitacion::class)->cuentaHabitaciones( $fecha_inicio  ,   $fecha_fin, $adultos,$menores,$tipo);
        $temporadas=$doctrine->getRepository(Temporada::class)->FindAll();
        $fotos=$doctrine->getRepository(Fotos::class)->FindAll();
        $contenido=[$habitacion,$habitacion_paginas,$temporadas,$fotos];
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


    


}