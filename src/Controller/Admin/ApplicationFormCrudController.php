<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationForm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApplicationFormCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ApplicationForm::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('aplformtitle'),
            DateField::new('appdate'),
            BooleanField::new('app_status'),
            AssociationField::new('orders')
        ];
    }

}
