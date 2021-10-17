<?php

namespace App\Controller\Admin;

use App\Entity\ObjectInAppForm;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ObjectInAppFormCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ObjectInAppForm::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            NumberField::new('product_count'),
            NumberField::new('service_count'),
            AssociationField::new('applicationForm'),
            AssociationField::new('service'),
            AssociationField::new('product')
        ];
    }

}
