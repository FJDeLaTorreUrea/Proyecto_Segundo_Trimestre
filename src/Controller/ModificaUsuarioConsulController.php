<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModificaUsuarioConsulController extends AbstractController
{
    /**
     * @Route("/perfil/datos/modifica/usuario/consul/", name="modifica_usuario_consul")
     */
    public function modificaUsuario(ManagerRegistry $doctrine,Request $request): Response
    {
        $entityM=$doctrine->getManager();
        $request = Request::createFromGlobals();
        
        //dd($request->request->get('id'));
        $id=$request->request->get('id');
        $nombre=$request->request->get('Nombre');
        $apellidos=$request->request->get('Apellidos');
        $telefono=$request->request->get('Telefono');
        $direccion=$request->request->get('Direccion');
        
        
        
        $usuario=$doctrine->getRepository(Usuario::class)->find($id);
        
        
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setTelefono($telefono);
        $usuario->setDireccion($direccion);

        $entityM->persist($usuario);
        $entityM->flush();

        return new Response("Hola");





        
    }
}
