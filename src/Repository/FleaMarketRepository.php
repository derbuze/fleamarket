<?php

namespace App\Repository;

use App\Entity\FleaMarket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FleaMarket|null find($id, $lockMode = null, $lockVersion = null)
 * @method FleaMarket|null findOneBy(array $criteria, array $orderBy = null)
 * @method FleaMarket[]    findAll()
 * @method FleaMarket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FleaMarketRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FleaMarket::class);
    }

    /**
     * @return FleaMarket[] Returns an array of FleaMarket objects
     */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?FleaMarket
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
