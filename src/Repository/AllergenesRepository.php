<?php

namespace App\Repository;

use App\Entity\Allergenes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Allergenes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allergenes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allergenes[]    findAll()
 * @method Allergenes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllergenesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Allergenes::class);
    }

    // /**
    //  * @return Allergenes[] Returns an array of Allergenes objects
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
    public function findOneBySomeField($value): ?Allergenes
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
