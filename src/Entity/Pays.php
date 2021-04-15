<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Timbre::class, mappedBy="pays")
     */
    private $timbres;

    public function __construct()
    {
        $this->timbres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Timbre[]
     */
    public function getTimbres(): Collection
    {
        return $this->timbres;
    }

    public function addTimbre(Timbre $timbre): self
    {
        if (!$this->timbres->contains($timbre)) {
            $this->timbres[] = $timbre;
            $timbre->setPays($this);
        }

        return $this;
    }

    public function removeTimbre(Timbre $timbre): self
    {
        if ($this->timbres->removeElement($timbre)) {
            // set the owning side to null (unless already changed)
            if ($timbre->getPays() === $this) {
                $timbre->setPays(null);
            }
        }

        return $this;
    }
}
