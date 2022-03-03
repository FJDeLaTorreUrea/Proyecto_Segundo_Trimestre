<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservaRepository::class)
 */
class Reserva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_Reserva;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_Inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_Fin;

    

    /**
     * @ORM\OneToOne(targetEntity=Habitacion::class, inversedBy="reserva", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Habitacion;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="reserva", cascade={"persist", "remove"})
     */
    private $Usuario;

    

    /**
     * @ORM\Column(type="float")
     */
    private $Precio_Final;

    /**
     * @ORM\Column(type="integer")
     */
    private $Adultos;

    /**
     * @ORM\Column(type="integer")
     */
    private $Menores;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaReserva(): ?\DateTimeInterface
    {
        return $this->Fecha_Reserva;
    }

    public function setFechaReserva(\DateTimeInterface $Fecha_Reserva): self
    {
        $this->Fecha_Reserva = $Fecha_Reserva;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->Fecha_Inicio;
    }

    public function setFechaInicio(\DateTimeInterface $Fecha_Inicio): self
    {
        $this->Fecha_Inicio = $Fecha_Inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->Fecha_Fin;
    }

    public function setFechaFin(\DateTimeInterface $Fecha_Fin): self
    {
        $this->Fecha_Fin = $Fecha_Fin;

        return $this;
    }

    

    public function getHabitacion(): ?Habitacion
    {
        return $this->Habitacion;
    }

    public function setHabitacion(Habitacion $Habitacion): self
    {
        $this->Habitacion = $Habitacion;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    

    public function setPrecioFinal(float $Precio_Final): self
    {
        $this->Precio_Final = $Precio_Final;

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
}
