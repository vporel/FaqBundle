<?php

namespace FaqBundle\Repository;

use RootBundle\Repository\Repository;
use Doctrine\Persistence\ManagerRegistry;
use FaqBundle\Entity\FaqGroup;

/**
 * @extends ServiceEntityRepository<FaqGroup>
 *
 * @method FaqGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method FaqGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method FaqGroup[]    findAll()
 * @method FaqGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @author Vivian NKOUANANG (https://github.com/vporel) <dev.vporel@gmail.com>
 */
class FaqGroupRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FaqGroup::class);
    }

}
