<?php

namespace App\Repository;

use App\Entity\Glace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glace|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glace|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glace[]    findAll()
 * @method Glace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlaceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glace::class);
    }

    // /**
    //  * @return Glace[] Returns an array of Glace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Glace
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
