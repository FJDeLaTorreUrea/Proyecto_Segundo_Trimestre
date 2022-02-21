<?php

namespace App\Entity;

use App\Repository\HabitacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HabitacionRepository::class)
 */
class Habitacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    //Da problemas en el ToString
    /**
     * @ORM\Column(type="integer")
     */
    private $N_habitacion;

    /**
     * @ORM\ManyToOne(targetEntity=TipoHabitacion::class, inversedBy="habitaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $Adultos;

    /**
     * @ORM\Column(type="integer")
     */
    private $Menores;

    /**
     * @ORM\Column(type="integer")
     */
    private $Camas;

    /**
     * @ORM\Column(type="float")
     */
    private $Temporada_alta;

    /**
     * @ORM\Column(type="float")
     */
    private $Temporada_Media;

    /**
     * @ORM\Column(type="float")
     */
    private $Temporada_Baja;

    /**
     * @ORM\OneToOne(targetEntity=Reserva::class, mappedBy="Habitacion", cascade={"persist", "remove"})
     */
    private $reserva;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Descripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNHabitacion(): ?int
    {
        return $this->N_habitacion;
    }

    public function setNHabitacion(int $N_habitacion): self
    {
        $this->N_habitacion = $N_habitacion;

        return $this;
    }

    public function getTipo(): ?TipoHabitacion
    {
        return $this->Tipo;
    }

    public function setTipo(?TipoHabitacion $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getAdultos(): ?int
    {
        return $this->Adultos;
    }

    public function setAdultos(int $Adultos): self
    {
        $this->Adultos = $Adultos;

        return $this;
    }

    public function getMenores(): ?int
    {
        return $this->Menores;
    }

    public function setMenores(int $Menores): self
    {
        $this->Menores = $Menores;

        return $this;
    }

    public function getCamas(): ?int
    {
        return $this->Camas;
    }

    public function setCamas(int $Camas): self
    {
        $this->Camas = $Camas;

        return $this;
    }

    public function getPrecioTemporadaAlta(): ?float
    {
        return $this->Temporada_alta;
    }

    public function setPrecioTemporadaAlta(float $Temporada_alta): self
    {
        $this->Temporada_alta = $Temporada_alta;

        return $this;
    }

    public function getPrecioTemporadaMedia(): ?float
    {
        return $this->Temporada_Media;
    }

    public function setPrecioTemporadaMedia(float $Temporada_Media): self
    {
        $this->Temporada_Media = $Temporada_Media;

        return $this;
    }

    public function getPrecioTemporadaBaja(): ?float
    {
        return $this->Temporada_Baja;
    }

    public function setPrecioTemporadaBaja(float $Temporada_Baja): self
    {
        $this->Temporada_Baja = $Temporada_Baja;

        return $this;
    }

    public function getReserva(): ?Reserva
    {
        return $this->reserva;
    }

    public function setReserva(Reserva $reserva): self
    {
        // set the owning side of the relation if necessary
        if ($reserva->getHabitacion() !== $this) {
            $reserva->setHabitacion($this);
        }

        $this->reserva = $reserva;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->Descripcion;
    }

    public function setDescripcion(string $Descripcion): self
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->N_habitacion;
    }
}
