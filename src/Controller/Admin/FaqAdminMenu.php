<?php

namespace FaqBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use FaqBundle\Entity\Faq;
use FaqBundle\Entity\FaqGroup;

/**
 * To be registered in the app admin dashboard
 */
class FaqAdminMenu
{
    public static function getMenu(): array{
        return [
            MenuItem::section("Faq"),
            MenuItem::linkToCrud("Groupes", "fas fa-layer-group", FaqGroup::class)->setController(FaqGroupCrudController::class),
            MenuItem::linkToCrud("Questions", "fas fa-question-circle", Faq::class)->setController(FaqCrudController::class),
        ];
    }
}