<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reserverings")
     */
    private $Kamer_id;

    /**
     * @ORM\ManyToOne(targetEntity=FosUser::class, inversedBy="reserverings")
     */
    private $user_id;

    /**
     * @ORM\Column(type="date")
     */
    private $CheckinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkOutDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalmethode;

    /**
     * @ORM\OneToMany(targetEntity=Betaal::class, mappedBy="reservering")
     */
    private $betaal_id;

    public function __construct()
    {
        $this->betaal_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerId(): ?Kamer
    {
        return $this->Kamer_id;
    }

    public function setKamerId(?int $Kamer_id): self
    {
        $this->Kamer_id = $Kamer_id;

        return $this;
    }

    public function getUserId(): ?FosUser
    {
        return $this->user_id;
    }

    public function setUserId(?FosUser $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->CheckinDate;
    }

    public function setCheckinDate(\DateTimeInterface $CheckinDate): self
    {
        $this->CheckinDate = $CheckinDate;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->checkOutDate;
    }

    public function setCheckOutDate(\DateTimeInterface $checkOutDate): self
    {
        $this->checkOutDate = $checkOutDate;

        return $this;
    }

    public function getBetaalmethode(): ?string
    {
        return $this->betaalmethode;
    }

    public function setBetaalmethode(string $betaalmethode): self
    {
        $this->betaalmethode = $betaalmethode;

        return $this;
    }

    /**
     * @return Collection|betaal[]
     */
    public function getBetaalId(): Collection
    {
        return $this->betaal_id;
    }

    public function addBetaalId(betaal $betaalId): self
    {
        if (!$this->betaal_id->contains($betaalId)) {
            $this->betaal_id[] = $betaalId;
            $betaalId->setReservering($this);
        }

        return $this;
    }

    public function removeBetaalId(betaal $betaalId): self
    {
        if ($this->betaal_id->contains($betaalId)) {
            $this->betaal_id->removeElement($betaalId);
            // set the owning side to null (unless already changed)
            if ($betaalId->getReservering() === $this) {
                $betaalId->setReservering(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getKamerId();
    }
}
