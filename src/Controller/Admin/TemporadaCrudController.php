<?php

namespace App\Controller\Admin;

use App\Entity\Temporada;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TemporadaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temporada::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
