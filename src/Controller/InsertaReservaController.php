<?php

namespace App\Controller;

use App\Entity\Reserva;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsertaReservaController extends AbstractController
{
    /**
     * @Route("/inserta/reserva", name="inserta_reserva")
     */
    public function index(ManagerRegistry $doctrine,Request $request): Response
    {
        $request = Request::createFromGlobals();
        $id_usuario=$request->request->get('id_usuario');
        $id_habitacion=$request->request->get('id_habitacion');
        $adultos=$request->request->get('adultos');
        $menores=$request->request->get('menores');
        $fecha_inicio=$request->request->get('fecha_inicio');
        $fecha_fin=$request->request->get('fecha_fin');
        $precio=$request->request->get('precio');
        



        
        //dd($request->request->get('pagina'));




        $entityM=$doctrine->getManager();


        
        
        $reserva=$doctrine->getRepository(Reserva::class)->insertaReserva($id_habitacion,$id_usuario,$fecha_inicio,$fecha_fin,$precio,$adultos,$menores);
        
        $encoder=new JsonEncoder;
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                
                
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return new Response("");
        // {"name":"Les-Tilleuls.coop","members":[{"name":"K\u00e9vin", organization: "Les-Tilleuls.coop"}]}
    }
}
