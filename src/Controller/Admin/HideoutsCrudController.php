<?php

namespace App\Controller\Admin;

use App\Entity\Hideouts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HideoutsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hideouts::class;
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
