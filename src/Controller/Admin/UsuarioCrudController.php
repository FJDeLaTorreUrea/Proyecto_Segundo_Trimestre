<?php

namespace App\Controller\Admin;

use App\Entity\Usuario;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsuarioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usuario::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Email'),
            TextField::new('Nombre'),
            TextField::new('Apellidos'),
            TextField::new('Telefono'),
            DateField::new('Fecha_nacimiento'),
            TextField::new('Direccion'),
            TextField::new('Password'),
            AssociationField::new('Nacionalidad'),
            ArrayField::new('roles'),
        
        ];
    }
   
}
