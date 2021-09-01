<?php

namespace App\Entity;

use App\Repository\HideoutsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HideoutsRepository::class)
 */
class Hideouts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, inversedBy="Hideouts")
     */
    private $Missions;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="hideouts")
     */
    private $missions;

    /**
     * @ORM\ManyToOne(targetEntity=HideoutsType::class, inversedBy="Hideouts")
     */
    private $Type;

    public function __construct()
    {
        $this->Missions = new ArrayCollection();
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Missions[]
     */
    public function getMissions(): Collection
    {
        return $this->Missions;
    }

    public function addMission(Missions $mission): self
    {
        if (!$this->Missions->contains($mission)) {
            $this->Missions[] = $mission;
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        $this->Missions->removeElement($mission);

        return $this;
    }

    public function getType(): ?HideoutsType
    {
        return $this->Type;
    }

    public function setType(?HideoutsType $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
}
