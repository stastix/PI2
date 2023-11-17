<?php

namespace App\Repository;

use App\Entity\Offrespecialevenment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offrespecialevenment>
 *
 * @method Offrespecialevenment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offrespecialevenment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offrespecialevenment[]    findAll()
 * @method Offrespecialevenment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffrespecialevenmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offrespecialevenment::class);
    }

//    /**
//     * @return Offrespecialevenment[] Returns an array of Offrespecialevenment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Offrespecialevenment
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
