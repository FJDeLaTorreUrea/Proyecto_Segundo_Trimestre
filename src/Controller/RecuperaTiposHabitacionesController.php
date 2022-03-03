<?php

namespace App\Controller;

use App\Entity\TipoHabitacion;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class RecuperaTiposHabitacionesController extends AbstractController
{
    /**
     * @Route("/recupera/tipos/habitaciones/2", name="recupera_tipos_habitaciones")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        
    

            $entityM=$doctrine->getManager();
    
    
            
            
            $tipos=$doctrine->getRepository(TipoHabitacion::class)->findAll();
            
            $encoder=new JsonEncoder;
            $defaultContext = [
                AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                    
                    
                },
            ];
            $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
    
            $serializer = new Serializer([$normalizer], [$encoder]);
            return new Response($serializer->serialize($tipos, 'json'),);
            // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}
    
            
    
            
    
            
           
        





    }
    /**
     * @Route("/recupera/tipos/habitaciones", name="recupera_tipos_habitaciones")
     */
    public function recuperaHabitaciones(ManagerRegistry $doctrine): Response
    {
            $entityM=$doctrine->getManager();
    
    
            
            
            $tipos=$doctrine->getRepository(TipoHabitacion::class)->findAll();
            
            $encoder=new JsonEncoder;
            $defaultContext = [
                AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                    
                    
                },
            ];
            $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
    
            $serializer = new Serializer([$normalizer], [$encoder]);
            return new Response($serializer->serialize($tipos, 'json'),);
            // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}
    
            
    
            
    
            
           
        





    }
}
