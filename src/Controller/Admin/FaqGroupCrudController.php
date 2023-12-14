<?php

namespace FaqBundle\Controller\Admin;

use RootBundle\Controller\Admin\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use FaqBundle\Entity\FaqGroup;

/**
 * To be registered in the app admin dashboard
 */
class FaqGroupCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return FaqGroup::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add("name");
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInSingular("Groupe de questions")->setEntityLabelInPlural("Groupes de questions");
    }

}
