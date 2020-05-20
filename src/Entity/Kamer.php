<?php

namespace App\Entity;

use App\Repository\KamerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KamerRepository::class)
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Soort::class, inversedBy="Kamers")
     */
    private $soort_id;

    /**
     * @ORM\ManyToOne(targetEntity=Extras::class, inversedBy="Kamers")
     */
    private $extras_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prijs;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="Kamer_id")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=Reservering::class, mappedBy="Kamer_id")
     */
    private $reserverings;

    /**
     * @ORM\ManyToOne(targetEntity=image::class, inversedBy="kamers")
     */
    private $image_id;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->reserverings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoortId(): ?soort
    {
        return $this->soort_id;
    }

    public function setSoortId(?soort $soort_id): self
    {
        $this->soort_id = $soort_id;

        return $this;
    }

    public function getExtrasId(): ?extras
    {
        return $this->extras_id;
    }

    public function setExtrasId(?extras $extras_id): self
    {
        $this->extras_id = $extras_id;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(?int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setKamerId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getKamerId() === $this) {
                $image->setKamerId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getReserverings(): Collection
    {
        return $this->reserverings;
    }

    public function addReservering(Reservering $reservering): self
    {
        if (!$this->reserverings->contains($reservering)) {
            $this->reserverings[] = $reservering;
            $reservering->setKamerId();
        }

        return $this;
    }

    public function removeReservering(Reservering $reservering): self
    {
        if ($this->reserverings->contains($reservering)) {
            $this->reserverings->removeElement($reservering);
            // set the owning side to null (unless already changed)
            if ($reservering->getKamerId() === $this) {
                $reservering->setKamerId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getSoortId();
    }

    public function getImageId(): ?image
    {
        return $this->image_id;
    }

    public function setImageId(?image $image_id): self
    {
        $this->image_id = $image_id;

        return $this;
    }
}
