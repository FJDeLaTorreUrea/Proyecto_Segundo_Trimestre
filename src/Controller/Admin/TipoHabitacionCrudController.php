<?php

namespace App\Controller\Admin;

use App\Entity\TipoHabitacion;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoHabitacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TipoHabitacion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nombre'),
        ];
    }
    
}
