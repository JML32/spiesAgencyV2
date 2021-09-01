<?php

namespace App\Entity;

use App\Repository\SpecialitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialitiesRepository::class)
 */
class Specialities
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
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Agents::class, mappedBy="Specialities")
     */
    private $Agents;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="requiredSpecialities")
     */
    private $Missions;

    public function __construct()
    {
        $this->Agents = new ArrayCollection();
        $this->Missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Agents[]
     */
    public function getAgents(): Collection
    {
        return $this->Agents;
    }

    public function addAgent(Agents $agent): self
    {
        if (!$this->Agents->contains($agent)) {
            $this->Agents[] = $agent;
            $agent->addSpeciality($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        if ($this->Agents->removeElement($agent)) {
            $agent->removeSpeciality($this);
        }

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
            $mission->addRequiredSpeciality($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->Missions->removeElement($mission)) {
            $mission->removeRequiredSpeciality($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->getDescription();
    }
}
