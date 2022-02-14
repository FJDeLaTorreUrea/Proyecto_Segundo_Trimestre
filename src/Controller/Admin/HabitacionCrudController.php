<?php

namespace App\Controller\Admin;

use App\Entity\Habitacion;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HabitacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitacion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            IntegerField::new('N_Habitacion'),
            IntegerField::new('Adultos'),
            IntegerField::new('Menores'),
            IntegerField::new('Camas'),
            AssociationField::new('Tipo'),
            NumberField::new('Precio_Temporada_Alta'),
            NumberField::new('Precio_Temporada_Media'),
            NumberField::new('Precio_Temporada_Baja'),
            TextEditorField::new('descripcion'),
        ];
    }
    
}
