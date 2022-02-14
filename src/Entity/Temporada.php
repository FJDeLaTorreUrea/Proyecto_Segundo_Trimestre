<?php

namespace App\Entity;

use App\Repository\TemporadaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemporadaRepository::class)
 */
class Temporada
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $Fecha_fin;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->Fecha_inicio;
    }

    public function setFechaInicio(\DateTimeInterface $Fecha_inicio): self
    {
        $this->Fecha_inicio = $Fecha_inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->Fecha_fin;
    }

    public function setFechaFin(\DateTimeInterface $Fecha_fin): self
    {
        $this->Fecha_fin = $Fecha_fin;

        return $this;
    }
}
