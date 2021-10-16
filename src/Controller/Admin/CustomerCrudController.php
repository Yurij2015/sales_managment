<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Contracts\Translation\TranslatorInterface;

class CustomerCrudController extends AbstractCrudController
{

    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }

    final
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular($this->translator->trans('Customer'))
            ->setEntityLabelInPlural($this->translator->trans('Customers'))
            ->setSearchFields(['fullname, phone'])
            ->setDefaultSort(['fullname' => 'DESC']);
    }

    final
    public function configureFields(string $pageName): iterable
    {
//        return [
//            IdField::new('id'),
//            TextField::new('title'),
//            TextEditorField::new('description'),
//        ];
        yield TextField::new('fullname', $this->translator->trans('FullName'));
        yield TextField::new('address');
        yield TextField::new('phone');
        yield EmailField::new('email');
        yield TextEditorField::new('access_info');
    }

}
