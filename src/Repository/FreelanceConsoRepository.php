<?php

namespace App\Repository;

use App\Entity\FreelanceConso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * @extends ServiceEntityRepository<FreelanceConso>
 */
class FreelanceConsoRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        #[Autowire(service: "fos_elastica.finder.freelance")]
        private readonly PaginatedFinderInterface $freelanceFinder
    )
    {
        parent::__construct($registry, FreelanceConso::class);
    }

    /**
     * @return FreelanceConso[]
     */
    public function search(string $query): array
    {
        return $this->freelanceFinder->find($query);
    }

    //    /**
    //     * @return FreelanceConso[] Returns an array of FreelanceConso objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FreelanceConso
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
