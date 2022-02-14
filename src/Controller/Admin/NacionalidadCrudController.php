<?php

namespace App\Controller\Admin;

use App\Entity\Nacionalidad;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NacionalidadCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Nacionalidad::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nombre'),
        ];
    }
   
}
