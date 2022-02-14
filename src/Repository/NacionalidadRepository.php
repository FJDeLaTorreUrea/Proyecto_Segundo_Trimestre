<?php

namespace App\Repository;

use App\Entity\Nacionalidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Nacionalidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nacionalidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nacionalidad[]    findAll()
 * @method Nacionalidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NacionalidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nacionalidad::class);
    }

    // /**
    //  * @return Nacionalidad[] Returns an array of Nacionalidad objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nacionalidad
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
