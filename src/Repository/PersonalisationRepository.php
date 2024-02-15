<?php

namespace App\Repository;

use App\Entity\Personalisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Personalisation>
 *
 * @method Personalisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personalisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personalisation[]    findAll()
 * @method Personalisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personalisation::class);
    }

//    /**
//     * @return Personalisation[] Returns an array of Personalisation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Personalisation
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
