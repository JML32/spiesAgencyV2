<?php

namespace App\Controller\Admin;

use App\Entity\HideoutsType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HideoutsTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HideoutsType::class;
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
