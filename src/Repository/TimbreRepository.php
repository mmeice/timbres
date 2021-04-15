<?php

namespace App\Repository;

use App\Entity\Timbre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Timbre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timbre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timbre[]    findAll()
 * @method Timbre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimbreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Timbre::class);
    }

    public function getTimbreParPropriete($propriete, $signe, $valeur) {
        return $this->createQueryBuilder('t')
        ->andWhere('t.' .$propriete. ' '. $signe.' :val')
        ->setParameter('val', $valeur) //variable pour protéger injections sql
//        ->orderBy('t.annee', 'ASC')
        ->getQuery()
        ->getResult()
    ;
    }


    // /**
    //  * @return Timbre[] Returns an array of Timbre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Timbre
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
