<?php

namespace App\Repository;

use App\Entity\BoxsIngredientsQuantites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BoxsIngredientsQuantites>
 *
 * @method BoxsIngredientsQuantites|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoxsIngredientsQuantites|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoxsIngredientsQuantites[]    findAll()
 * @method BoxsIngredientsQuantites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoxsIngredientsQuantitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoxsIngredientsQuantites::class);
    }

//    /**
//     * @return BoxsIngredientsQuantites[] Returns an array of BoxsIngredientsQuantites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BoxsIngredientsQuantites
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
