<?php
namespace FaqBundle\Controller;
;
use FaqBundle\Repository\FaqGroupRepository;
use RootBundle\Controller\AbstractApiController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Vivian NKOUANANG (https://github.com/vporel) <dev.vporel@gmail.com>
 */
class FaqApiController extends AbstractApiController{
    
    // #[Route("/api/faq", name:"api.faq", methods: ["GET"], priority: 100)]
    public function index(FaqGroupRepository $groupRepo){
        $groups = $groupRepo->findAll();
        return $this->success($groups);
    }
}