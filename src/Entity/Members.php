<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MembersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MembersRepository::class)
 */
class Members
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=Groep::class, inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groepId;

    /**
     * @ORM\OneToMany(targetEntity=PaymentLog::class, mappedBy="memberId")
     */
    private $paymentLogs;

    public function __construct()
    {
        $this->paymentLogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getGroepId(): ?Groep
    {
        return $this->groepId;
    }

    public function setGroepId(?Groep $groepId): self
    {
        $this->groepId = $groepId;

        return $this;
    }

    /**
     * @return Collection|PaymentLog[]
     */
    public function getPaymentLogs(): Collection
    {
        return $this->paymentLogs;
    }

    public function addPaymentLog(PaymentLog $paymentLog): self
    {
        if (!$this->paymentLogs->contains($paymentLog)) {
            $this->paymentLogs[] = $paymentLog;
            $paymentLog->setMemberId($this);
        }

        return $this;
    }

    public function removePaymentLog(PaymentLog $paymentLog): self
    {
        if ($this->paymentLogs->removeElement($paymentLog)) {
            // set the owning side to null (unless already changed)
            if ($paymentLog->getMemberId() === $this) {
                $paymentLog->setMemberId(null);
            }
        }

        return $this;
    }
}
