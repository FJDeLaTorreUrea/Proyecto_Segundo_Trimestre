<?php

namespace App\Entity;

use App\Repository\TipoHabitacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoHabitacionRepository::class)
 */
class TipoHabitacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Nombre;

    

    /**
     * @ORM\OneToMany(targetEntity=Habitacion::class, mappedBy="Tipo", orphanRemoval=true)
     */
    private $habitaciones;

    public function __construct()
    {
        $this->habitaciones = new ArrayCollection();
    }

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

    

    /**
     * @return Collection|Habitacion[]
     */
    public function getHabitaciones(): Collection
    {
        return $this->habitaciones;
    }

    public function addHabitacione(Habitacion $habitacione): self
    {
        if (!$this->habitaciones->contains($habitacione)) {
            $this->habitaciones[] = $habitacione;
            $habitacione->setTipo($this);
        }

        return $this;
    }

    public function removeHabitacione(Habitacion $habitacione): self
    {
        if ($this->habitaciones->removeElement($habitacione)) {
            // set the owning side to null (unless already changed)
            if ($habitacione->getTipo() === $this) {
                $habitacione->setTipo(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Nombre;
    }
}
