<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="images")
     */
    private $Kamer_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagefile;

    /**
     * @ORM\OneToMany(targetEntity=Kamer::class, mappedBy="image_id")
     */
    private $kamers;

    public function __construct()
    {
        $this->kamers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerId(): ?kamer
    {
        return $this->Kamer_id;
    }

    public function setKamerId(?int $kamer_id): self
    {   $this->kamer_id = $kamer_id;

        return $this;
    }

    public function getImagefile(): ?string
    {
        return $this->imagefile;
    }

    public function setImagefile(?string $imagefile): self
    {
        $this->imagefile = $imagefile;

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getImagefile();
    }

    /**
     * @return Collection|Kamer[]
     */
    public function getKamers(): Collection
    {
        return $this->kamers;
    }

    public function addKamer(Kamer $kamer): self
    {
        if (!$this->kamers->contains($kamer)) {
            $this->kamers[] = $kamer;
            $kamer->setImageId($this);
        }

        return $this;
    }

    public function removeKamer(Kamer $kamer): self
    {
        if ($this->kamers->contains($kamer)) {
            $this->kamers->removeElement($kamer);
            // set the owning side to null (unless already changed)
            if ($kamer->getImageId() === $this) {
                $kamer->setImageId(null);
            }
        }

        return $this;
    }
}
