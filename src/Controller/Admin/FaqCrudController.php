<?php

namespace FaqBundle\Controller\Admin;

use RootBundle\Controller\Admin\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use FaqBundle\Entity\Faq;
use RootBundle\Service\NodeApp;

/**
 * To be registered in the app admin dashboard
 */
class FaqCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Faq::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return array_merge(parent::configureFields($pageName), [
            "group" => AssociationField::new("group"),
            "answer" => TextEditorField::new("answer")
        ]);
    }
    
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add("question")
            ->add("group");
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInSingular("Question")->setEntityLabelInPlural("Questions fréquentes");
    }

    public function configureActions(Actions $actions): Actions
    {
        $updateChatBot = Action::new("update-chat-bot", "Mettre à jour le ChatBot", "fas fa-refresh")
            ->createAsGlobalAction()
            ->linkToCrudAction("updateChatBot");
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $updateChatBot);
        ;
    } 

    public function updateChatBot(NodeApp $nodeApp){
        $nodeApp->updateFaqChatBot();
        $this->addFlash("success", "ChatBot mis à jour");
        $indexUrl = $this->container->get(AdminUrlGenerator::class)->setAction("index")->generateUrl();
        return $this->redirect($indexUrl);
    }
}
