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
     * @ORM\Column(type="string", length=70)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $Apellidos;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Telefono;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Email;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_Nacimiento;

    /**
     * @ORM\ManyToOne(targetEntity=Nacionalidad::class, inversedBy="reservas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Nacionalidad;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $Direccion;

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
     * @ORM\Column(type="boolean")
     */
    private $Desayuno;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Comida;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Cena;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Gim_Spa;

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

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): self
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(string $Telefono): self
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->Fecha_Nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $Fecha_Nacimiento): self
    {
        $this->Fecha_Nacimiento = $Fecha_Nacimiento;

        return $this;
    }

    public function getNacionalidad(): ?Nacionalidad
    {
        return $this->Nacionalidad;
    }

    public function setNacionalidad(?Nacionalidad $Nacionalidad): self
    {
        $this->Nacionalidad = $Nacionalidad;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): self
    {
        $this->Direccion = $Direccion;

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

    public function getDesayuno(): ?bool
    {
        return $this->Desayuno;
    }

    public function setDesayuno(bool $Desayuno): self
    {
        $this->Desayuno = $Desayuno;

        return $this;
    }

    public function getComida(): ?bool
    {
        return $this->Comida;
    }

    public function setComida(bool $Comida): self
    {
        $this->Comida = $Comida;

        return $this;
    }

    public function getCena(): ?bool
    {
        return $this->Cena;
    }

    public function setCena(bool $Cena): self
    {
        $this->Cena = $Cena;

        return $this;
    }

    public function getGimSpa(): ?bool
    {
        return $this->Gim_Spa;
    }

    public function setGimSpa(bool $Gim_Spa): self
    {
        $this->Gim_Spa = $Gim_Spa;

        return $this;
    }

    public function getPrecioFinal(): ?float
    {
        return $this->Precio_Final;
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