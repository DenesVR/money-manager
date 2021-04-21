<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     itemOperations={
 *          "post"={
 *               "access-control"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')"
 *              },
 *          "get"={
 *               "access-control"="is_granted('IS_AUTHENTICATED_FULLY')"
 *              },
 *          "put"={
 *               "access-control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user"
 *              }
 *     }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
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
     *  @Assert\Regex(
     *     pattern="/^([a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:[.-]?[a-zA-Z0-9]+)*\.[a-zA-Z]{2,7})$/",
     *     message="Invalid email"
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=7, max=255)
     */
    private $wachtwoord;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $profielFoto;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\Regex(
     *     pattern="/BE\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}|BE\d{14}/",
     *     message="Invalid bank account number"
     * )
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

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getPassword()
    {
        return $this->wachtwoord;
    }

    public function getUsername()
    {
        return $this->email;
    }
}
