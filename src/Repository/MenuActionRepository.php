<?php

namespace App\Repository;

use App\Entity\MenuAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MenuAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuAction[]    findAll()
 * @method MenuAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuAction::class);
    }

    // /**
    //  * @return MenuAction[] Returns an array of MenuAction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuAction
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
