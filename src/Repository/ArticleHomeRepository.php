<?php

namespace App\Repository;

use App\Entity\ArticleHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleHome[]    findAll()
 * @method ArticleHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleHome::class);
    }

    // /**
    //  * @return ArticleHome[] Returns an array of ArticleHome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleHome
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
