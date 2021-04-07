<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=GroepRepository::class)
 */
class Groep
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
    private $groepNaam;

    /**
     * @ORM\OneToMany(targetEntity=Members::class, mappedBy="groepId")
     */
    private $members;

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroepNaam(): ?string
    {
        return $this->groepNaam;
    }

    public function setGroepNaam(string $groepNaam): self
    {
        $this->groepNaam = $groepNaam;

        return $this;
    }

    /**
     * @return Collection|Members[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Members $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setGroepId($this);
        }

        return $this;
    }

    public function removeMember(Members $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getGroepId() === $this) {
                $member->setGroepId(null);
            }
        }

        return $this;
    }
}
