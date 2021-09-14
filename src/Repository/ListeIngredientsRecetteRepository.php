<?php

namespace App\Repository;

use App\Entity\ListeIngredientsRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeIngredientsRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeIngredientsRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeIngredientsRecette[]    findAll()
 * @method ListeIngredientsRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeIngredientsRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeIngredientsRecette::class);
    }

    // /**
    //  * @return ListeIngredientsRecette[] Returns an array of ListeIngredientsRecette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeIngredientsRecette
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
