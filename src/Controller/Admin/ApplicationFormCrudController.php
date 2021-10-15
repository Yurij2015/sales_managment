<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationForm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ApplicationFormCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ApplicationForm::class;
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
