<?php

namespace App\Entity;

use App\Repository\BetaalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetaalRepository::class)
 */
class Betaal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $soort;

    /**
     * @ORM\Column(type="float")
     */
    private $creditcardnr;

    /**
     * @ORM\Column(type="date")
     */
    private $betaaldate;

    /**
     * @ORM\ManyToOne(targetEntity=FosUser::class, inversedBy="betaals")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=Reservering::class, inversedBy="betaal_id")
     */
    private $reservering;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(?string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getCreditcardnr(): ?float
    {
        return $this->creditcardnr;
    }

    public function setCreditcardnr(float $creditcardnr): self
    {
        $this->creditcardnr = $creditcardnr;

        return $this;
    }

    public function getBetaaldate(): ?\DateTimeInterface
    {
        return $this->betaaldate;
    }

    public function setBetaaldate(\DateTimeInterface $betaaldate): self
    {
        $this->betaaldate = $betaaldate;

        return $this;
    }

    public function getUserId(): ?fosuser
    {
        return $this->user_id;
    }

    public function setUserId(?fosuser $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getReservering(): ?Reservering
    {
        return $this->reservering;
    }

    public function setReservering(?Reservering $reservering): self
    {
        $this->reservering = $reservering;

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getBetaaldate();
    }
}
