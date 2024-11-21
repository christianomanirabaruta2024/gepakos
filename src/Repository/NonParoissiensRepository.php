<?php

namespace App\Repository;

use App\Entity\NonParoissiens;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NonParoissiens>
 */
class NonParoissiensRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NonParoissiens::class);
    }

    public function countNonParoissien(): int
    {
        return (int) $this->createQueryBuilder('b')
            ->select('COUNT(b.id_non_paroissien)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findAllNonParoissiensWithAdresses(int $page = 1, int $limit = 6): array
    {
        $offset = ($page - 1) * $limit;
    
        // Compter le nombre total d'enregistrements
        $total = $this->createQueryBuilder('p')
            ->select('COUNT(p.id_non_paroissien)')
            ->getQuery()
            ->getSingleScalarResult();
    
        $results = $this->createQueryBuilder('p') // Alias pour Paroissiens
            ->leftJoin('p.adresse', 'a')         // Utilise la propriété `adresse` définie dans l'entité
            ->addSelect('a')                    // Charge également les données d'adresse
            ->setFirstResult($offset)           // Définir l'offset
            ->setMaxResults($limit)             // Définir le nombre de résultats par page
            ->getQuery()
            ->getResult();
    
        return [
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'pages' => ceil($total / $limit),
            'data' => $results,
        ];
    }

//    /**
//     * @return NonParoissiens[] Returns an array of NonParoissiens objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NonParoissiens
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
