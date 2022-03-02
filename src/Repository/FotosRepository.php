<?php

namespace App\Repository;

use App\Entity\Fotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fotos[]    findAll()
 * @method Fotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fotos::class);
    }

    public function obtenFotosPaginadas(int $pagina=1, int $filas=4)
    {
        $conn = $this->getEntityManager()->getConnection();

        $registros = array();
        $sql = "SELECT * FROM Fotos;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $registros = $resultSet->fetchAll();
        $n_total = count($registros);

        $total = count($registros);
        $paginas = ceil($total /$filas);
        $registros = array();
        if ($pagina <= $paginas)
        {
            $inicio = ($pagina-1) * $filas;
            $sql = "SELECT Nombre,habitacion.n_habitacion FROM fotos INNER JOIN habitacion ON habitacion.id=fotos.habitacion_id LIMIT $inicio, $filas; ";
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery();
            $registros = $resultSet->fetchAll(); 
        }
        return $registros;
    }

    // /**
    //  * @return Fotos[] Returns an array of Fotos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fotos
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
