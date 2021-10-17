<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationForm;
use App\Entity\ObjectInAppForm;
use App\Entity\Product;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Customer;
use App\Entity\Order;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractDashboardController
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function index(): Response
    {
//        return parent::index();
        $routerBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routerBuilder->setController(CustomerCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sales Management')
            ->setFaviconPath('favicon.svg')
            ->generateRelativeUrls()
            ->disableUrlSignatures()
            ->setTranslationDomain('admin');
//            ->renderSidebarMinimized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard($this->translator->trans('Dashboard'), 'fa fa-home');
        yield MenuItem::section($this->translator->trans('Sales management'));
        yield MenuItem::linkToCrud($this->translator->trans('Customers'), 'fas fa-users', Customer::class);
        yield MenuItem::linkToCrud($this->translator->trans('Orders'), 'fa fa-list-alt', Order::class);
        yield MenuItem::linkToCrud($this->translator->trans('Services'), 'fa fa-sort-amount-asc', Service::class);
        yield MenuItem::linkToCrud($this->translator->trans('Products'), 'fa fa-cube', Product::class);
        yield MenuItem::linkToCrud($this->translator->trans('Applications'), 'fa fa-bars', ApplicationForm::class);
        yield MenuItem::linkToCrud($this->translator->trans('Object in applications'), 'fa fa-object-group', ObjectInAppForm::class);
        yield MenuItem::section($this->translator->trans('Administration tools'));
//        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
        yield MenuItem::linkToUrl($this->translator->trans('Search in Google'), 'fab fa-google', 'https://google.com');


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
