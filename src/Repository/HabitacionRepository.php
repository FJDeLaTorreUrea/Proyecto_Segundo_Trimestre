<?php

namespace App\Repository;

use App\Entity\Habitacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Habitacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Habitacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Habitacion[]    findAll()
 * @method Habitacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HabitacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Habitacion::class);
    }



    public function cuentaHabitaciones($fecha_inicio,$fecha_fin)
    {
        $conn = $this->getEntityManager()->getConnection();

        $registros=array();
        $sql="SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM( SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM habitacion INNER JOIN tipo_habitacion ON habitacion.tipo_id = tipo_habitacion.id WHERE habitacion.id NOT IN(SELECT habitacion_id FROM reserva) UNION SELECT habitacion.n_habitacion , habitacion.adultos,habitacion.menores,habitacion.descripcion,habitacion.camas,habitacion.temporada_alta,habitacion.temporada_media,habitacion.temporada_baja FROM reserva INNER JOIN habitacion ON habitacion.id = reserva.habitacion_id WHERE fecha_inicio>'${fecha_inicio}' OR fecha_fin<'${fecha_fin}')a ;";
        $stmt=$conn->prepare($sql);
        $resultSet=$stmt->executeQuery();
        $registros=$resultSet->fetchAll();
        $numero_total=count($registros);


        $paginas=ceil($numero_total/4);

        return "Paginas:".$paginas;



    }

    public function obtenHabitacionesPaginados(int $pagina=1, int $filas=4,$fecha_inicio,$fecha_fin)
    {
        $conn = $this->getEntityManager()->getConnection();

        $registros = array();
        $sql = "SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM( SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM habitacion INNER JOIN tipo_habitacion ON habitacion.tipo_id = tipo_habitacion.id WHERE habitacion.id NOT IN(SELECT habitacion_id FROM reserva) UNION SELECT habitacion.n_habitacion , habitacion.adultos,habitacion.menores,habitacion.descripcion,habitacion.camas,habitacion.temporada_alta,habitacion.temporada_media,habitacion.temporada_baja FROM reserva INNER JOIN habitacion ON habitacion.id = reserva.habitacion_id WHERE fecha_inicio>'${fecha_inicio}' OR fecha_fin<'${fecha_fin}')a ;";
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
            $sql = "SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM( SELECT n_habitacion,adultos,menores,descripcion,camas,temporada_alta,temporada_media,temporada_baja FROM habitacion INNER JOIN tipo_habitacion ON habitacion.tipo_id = tipo_habitacion.id WHERE habitacion.id NOT IN(SELECT habitacion_id FROM reserva) UNION SELECT habitacion.n_habitacion , habitacion.adultos,habitacion.menores,habitacion.descripcion,habitacion.camas,habitacion.temporada_alta,habitacion.temporada_media,habitacion.temporada_baja FROM reserva INNER JOIN habitacion ON habitacion.id = reserva.habitacion_id WHERE fecha_inicio>'${fecha_inicio}' OR fecha_fin<'${fecha_fin}')a LIMIT $inicio, $filas;";
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery();
            $registros = $resultSet->fetchAll(); 
        }
        return $registros;
    }

    // /**
    //  * @return Habitacion[] Returns an array of Habitacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Habitacion
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
