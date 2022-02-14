<?php

namespace App\Entity;

use App\Entity\Habitacion;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FotosRepository;

/**
 * @ORM\Entity(repositoryClass=FotosRepository::class)
 */
class Fotos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Nombre;

    /**
     * @ORM\ManyToOne(targetEntity=Habitacion::class, inversedBy="fotos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $habitacion;

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

    public function getHabitacion(): ?Habitacion
    {
        return $this->habitacion;
    }

    public function setHabitacion(?Habitacion $habitacion): self
    {
        $this->habitacion = $habitacion;

        return $this;
    }
}
