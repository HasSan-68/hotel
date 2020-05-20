<?php

namespace App\Entity;

use App\Repository\OrganisatiomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisatiomRepository::class)
 */
class Organisatiom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $phone_nr;

    /**
     * @ORM\OneToMany(targetEntity=FosUser::class, mappedBy="organisation_id")
     */
    private $fosUsers;

    public function __construct()
    {
        $this->fosUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNr(): ?float
    {
        return $this->phone_nr;
    }

    public function setPhoneNr(float $phone_nr): self
    {
        $this->phone_nr = $phone_nr;

        return $this;
    }

    /**
     * @return Collection|FosUser[]
     */
    public function getFosUsers(): Collection
    {
        return $this->fosUsers;
    }

    public function addFosUser(FosUser $fosUser): self
    {
        if (!$this->fosUsers->contains($fosUser)) {
            $this->fosUsers[] = $fosUser;
            $fosUser->setOrganisationId($this);
        }

        return $this;
    }

    public function removeFosUser(FosUser $fosUser): self
    {
        if ($this->fosUsers->contains($fosUser)) {
            $this->fosUsers->removeElement($fosUser);
            // set the owning side to null (unless already changed)
            if ($fosUser->getOrganisationId() === $this) {
                $fosUser->setOrganisationId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getName();
    }
}
