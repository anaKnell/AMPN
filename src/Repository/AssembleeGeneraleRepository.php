<?php

namespace App\Repository;

use App\Entity\AssembleeGenerale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AssembleeGenerale|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssembleeGenerale|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssembleeGenerale[]    findAll()
 * @method AssembleeGenerale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssembleeGeneraleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssembleeGenerale::class);
    }

    // /**
    //  * @return AssembleeGenerale[] Returns an array of AssembleeGenerale objects
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
    public function findOneBySomeField($value): ?AssembleeGenerale
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
