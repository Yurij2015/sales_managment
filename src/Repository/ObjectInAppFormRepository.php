<?php

namespace App\Repository;

use App\Entity\ObjectInAppForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ObjectInAppForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectInAppForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectInAppForm[]    findAll()
 * @method ObjectInAppForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectInAppFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectInAppForm::class);
    }

    // /**
    //  * @return ObjectInAppForm[] Returns an array of ObjectInAppForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectInAppForm
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
