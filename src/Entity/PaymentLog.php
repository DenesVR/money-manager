<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PaymentLogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PaymentLogRepository::class)
 */
class PaymentLog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $bedrag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $details;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $foto;

    /**
     * @ORM\Column(type="float")
     */
    private $calculated;

    /**
     * @ORM\ManyToOne(targetEntity=Members::class, inversedBy="paymentLogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $memberId;

    /**
     * @ORM\ManyToOne(targetEntity=Afrekening::class)
     */
    private $afrekeningId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBedrag(): ?float
    {
        return $this->bedrag;
    }

    public function setBedrag(float $bedrag): self
    {
        $this->bedrag = $bedrag;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getCalculated(): ?float
    {
        return $this->calculated;
    }

    public function setCalculated(float $calculated): self
    {
        $this->calculated = $calculated;

        return $this;
    }

    public function getMemberId(): ?Members
    {
        return $this->memberId;
    }

    public function setMemberId(?Members $memberId): self
    {
        $this->memberId = $memberId;

        return $this;
    }

    public function getAfrekeningId(): ?Afrekening
    {
        return $this->afrekeningId;
    }

    public function setAfrekeningId(?Afrekening $afrekeningId): self
    {
        $this->afrekeningId = $afrekeningId;

        return $this;
    }
}
