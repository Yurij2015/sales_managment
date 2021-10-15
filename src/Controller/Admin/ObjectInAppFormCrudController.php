<?php

namespace App\Controller\Admin;

use App\Entity\ObjectInAppForm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ObjectInAppFormCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ObjectInAppForm::class;
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
