<?php

namespace App\Controller\Admin;

use App\Entity\Targets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TargetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Targets::class;
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
