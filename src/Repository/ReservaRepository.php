<?php

namespace App\Repository;

use App\Entity\Reserva;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Reserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserva[]    findAll()
 * @method Reserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reserva::class);
    }

    public function insertaReserva($id_habitacion,$id_usuario,$fecha_inicio,$fecha_fin,$precio_final,$adultos,$menores)
    {
        

        $conn = $this->getEntityManager()->getConnection();
        $fecha_actual=date('Y-m-d');
        
        $sql="INSERT INTO reserva (habitacion_id,usuario_id,fecha_reserva,fecha_inicio,fecha_fin,precio_final,adultos,menores) VALUES ('${id_habitacion}','${id_usuario}','${fecha_actual}',STR_TO_DATE('$fecha_inicio','%m/%d/%Y'),STR_TO_DATE('$fecha_fin','%m/%d/%Y'),${precio_final},${adultos},${menores});";
        
        $stmt=$conn->prepare($sql);
        $resultSet=$stmt->executeQuery();
    
    
    }

    public function devuelveReservasPorUsuario($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $registros=array();
        $sql="SELECT * FROM reserva WHERE usuario_id='${id}';";
        $stmt=$conn->prepare($sql);
        $resultSet=$stmt->executeQuery();
        $registros=$resultSet->fetchAll();

        return $registros;





    }
    // /**
    //  * @return Reserva[] Returns an array of Reserva objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reserva
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
