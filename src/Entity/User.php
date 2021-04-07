<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wachtwoord;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $profielFoto;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $rekeningnummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

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

    public function getWachtwoord(): ?string
    {
        return $this->wachtwoord;
    }

    public function setWachtwoord(string $wachtwoord): self
    {
        $this->wachtwoord = $wachtwoord;

        return $this;
    }

    public function getProfielFoto()
    {
        return $this->profielFoto;
    }

    public function setProfielFoto($profielFoto): self
    {
        $this->profielFoto = $profielFoto;

        return $this;
    }

    public function getRekeningnummer(): ?string
    {
        return $this->rekeningnummer;
    }

    public function setRekeningnummer(string $rekeningnummer): self
    {
        $this->rekeningnummer = $rekeningnummer;

        return $this;
    }
}
