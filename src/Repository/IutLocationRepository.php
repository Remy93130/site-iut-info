<?php

namespace App\Repository;

use App\Entity\IutLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IutLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method IutLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method IutLocation[]    findAll()
 * @method IutLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IutLocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IutLocation::class);
    }

//    /**
//     * @return IutLocation[] Returns an array of IutLocation objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IutLocation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
