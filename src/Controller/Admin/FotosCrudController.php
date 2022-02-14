<?php

namespace App\Controller\Admin;

use App\Entity\Fotos;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FotosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fotos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            ImageField::new('Nombre')->setUploadDir("public/Imagenes_subidas"),
            AssociationField::new('habitacion'),
        ];
    }
   
}
