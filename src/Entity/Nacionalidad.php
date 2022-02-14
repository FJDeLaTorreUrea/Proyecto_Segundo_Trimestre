<?php

namespace App\Entity;

use App\Repository\NacionalidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NacionalidadRepository::class)
 */
class Nacionalidad
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
     * @ORM\OneToMany(targetEntity=Usuario::class, mappedBy="Nacionalidad")
     */
    private $usuarios;

    /**
     * @ORM\OneToMany(targetEntity=Reserva::class, mappedBy="Nacionalidad")
     */
    private $reservas;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->reservas = new ArrayCollection();
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
     * @return Collection|Usuario[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setNacionalidad($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getNacionalidad() === $this) {
                $usuario->setNacionalidad(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reserva[]
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): self
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas[] = $reserva;
            $reserva->setNacionalidad($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getNacionalidad() === $this) {
                $reserva->setNacionalidad(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Nombre;
    }
}
