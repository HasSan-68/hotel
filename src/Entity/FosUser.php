<?php

namespace App\Entity;

use App\Repository\FosUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FosUserRepository::class)
 */
class FosUser
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username_canonice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_canonical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_login;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $confirmation_token;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password_requeste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_activity;

    /**
     * @ORM\Column(type="float")
     */
    private $tel_nr;

    /**
     * @ORM\Column(type="float")
     */
    private $mobile_nr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $insertion_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $functioneel;

    /**
     * @ORM\ManyToOne(targetEntity=Organisatiom::class, inversedBy="FosUser")
     */
    private $organisation_id;

    /**
     * @ORM\OneToMany(targetEntity=Reservering::class, mappedBy="user_id")
     */
    private $reserverings;

    /**
     * @ORM\OneToMany(targetEntity=Betaal::class, mappedBy="user_id")
     */
    private $betaals;

    public function __construct()
    {
        $this->reserverings = new ArrayCollection();
        $this->betaals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsernameCanonice(): ?string
    {
        return $this->username_canonice;
    }

    public function setUsernameCanonice(?string $username_canonice): self
    {
        $this->username_canonice = $username_canonice;

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

    public function getEmailCanonical(): ?string
    {
        return $this->email_canonical;
    }

    public function setEmailCanonical(string $email_canonical): self
    {
        $this->email_canonical = $email_canonical;

        return $this;
    }

    public function getEnabled(): ?string
    {
        return $this->enabled;
    }

    public function setEnabled(?string $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastLogin(): ?string
    {
        return $this->last_login;
    }

    public function setLastLogin(string $last_login): self
    {
        $this->last_login = $last_login;

        return $this;
    }

    public function getConfirmationToken(): ?string
    {
        return $this->confirmation_token;
    }

    public function setConfirmationToken(?string $confirmation_token): self
    {
        $this->confirmation_token = $confirmation_token;

        return $this;
    }

    public function getPasswordRequeste(): ?string
    {
        return $this->password_requeste;
    }

    public function setPasswordRequeste(string $password_requeste): self
    {
        $this->password_requeste = $password_requeste;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getLastActivity(): ?string
    {
        return $this->last_activity;
    }

    public function setLastActivity(?string $last_activity): self
    {
        $this->last_activity = $last_activity;

        return $this;
    }

    public function getTelNr(): ?float
    {
        return $this->tel_nr;
    }

    public function setTelNr(float $tel_nr): self
    {
        $this->tel_nr = $tel_nr;

        return $this;
    }

    public function getMobileNr(): ?float
    {
        return $this->mobile_nr;
    }

    public function setMobileNr(float $mobile_nr): self
    {
        $this->mobile_nr = $mobile_nr;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getInsertionName(): ?string
    {
        return $this->insertion_name;
    }

    public function setInsertionName(string $insertion_name): self
    {
        $this->insertion_name = $insertion_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

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

    public function getFunctioneel(): ?string
    {
        return $this->functioneel;
    }

    public function setFunctioneel(?string $functioneel): self
    {
        $this->functioneel = $functioneel;

        return $this;
    }

    public function getOrganisationId(): ?Organisatiom
    {
        return $this->organisation_id;
    }

    public function setOrganisationId(?Organisatiom $organisation_id): self
    {
        $this->organisation_id = $organisation_id;

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
            $reservering->setUserId($this);
        }

        return $this;
    }

    public function removeReservering(Reservering $reservering): self
    {
        if ($this->reserverings->contains($reservering)) {
            $this->reserverings->removeElement($reservering);
            // set the owning side to null (unless already changed)
            if ($reservering->getUserId() === $this) {
                $reservering->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Betaal[]
     */
    public function getBetaals(): Collection
    {
        return $this->betaals;
    }

    public function addBetaal(Betaal $betaal): self
    {
        if (!$this->betaals->contains($betaal)) {
            $this->betaals[] = $betaal;
            $betaal->setUserId($this);
        }

        return $this;
    }

    public function removeBetaal(Betaal $betaal): self
    {
        if ($this->betaals->contains($betaal)) {
            $this->betaals->removeElement($betaal);
            // set the owning side to null (unless already changed)
            if ($betaal->getUserId() === $this) {
                $betaal->setUserId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->id.'->'.$this->getUsername();
    }
}
