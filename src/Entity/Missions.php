<?php

namespace App\Entity;

use App\Repository\MissionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MissionsRepository::class)
 */
class Missions
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="date")
     */
    private $begin_At;

    /**
     * @ORM\Column(type="date")
     */
    private $ended_At;

    /**
     * @ORM\ManyToMany(targetEntity=Agents::class, mappedBy="Missions")
     */
    private $Agents;

    /**
     * @ORM\ManyToMany(targetEntity=Contacts::class, mappedBy="Missions")
     */
    private $Contacts;

    /**
     * @ORM\ManyToMany(targetEntity=Hideouts::class, mappedBy="Missions")
     */
    private $Hideouts;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="Missions")
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity=Targets::class, inversedBy="Missions")
     */
    private $Targets;

    /**
     * @ORM\ManyToMany(targetEntity=Contacts::class, inversedBy="missions")
     */
    private $contacts;

    /**
     * @ORM\ManyToMany(targetEntity=Hideouts::class, inversedBy="missions")
     */
    private $hideouts;

    /**
     * @ORM\ManyToOne(targetEntity=MissionType::class, inversedBy="Missions")
     */
    private $missionType;

    /**
     * @ORM\ManyToMany(targetEntity=Specialities::class, inversedBy="Missions")
     */
    private $requiredSpecialities;

    public function __construct()
    {
        $this->Agents = new ArrayCollection();
        $this->Contacts = new ArrayCollection();
        $this->Hideouts = new ArrayCollection();
        $this->Targets = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->hideouts = new ArrayCollection();
        $this->requiredSpecialities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getCodeName(): ?string
    {
        return $this->codeName;
    }

    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

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

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->begin_At;
    }

    public function setBeginAt(\DateTimeInterface $begin_At): self
    {
        $this->begin_At = $begin_At;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->ended_At;
    }

    public function setEndedAt(\DateTimeInterface $ended_At): self
    {
        $this->ended_At = $ended_At;

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
            $agent->addMission($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        if ($this->Agents->removeElement($agent)) {
            $agent->removeMission($this);
        }

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->Contacts;
    }

    public function addContact(Contacts $contact): self
    {
        if (!$this->Contacts->contains($contact)) {
            $this->Contacts[] = $contact;
            $contact->addMission($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->Contacts->removeElement($contact)) {
            $contact->removeMission($this);
        }

        return $this;
    }

    /**
     * @return Collection|Hideouts[]
     */
    public function getHideouts(): Collection
    {
        return $this->Hideouts;
    }

    public function addHideout(Hideouts $hideout): self
    {
        if (!$this->Hideouts->contains($hideout)) {
            $this->Hideouts[] = $hideout;
            $hideout->addMission($this);
        }

        return $this;
    }

    public function removeHideout(Hideouts $hideout): self
    {
        if ($this->Hideouts->removeElement($hideout)) {
            $hideout->removeMission($this);
        }

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Targets[]
     */
    public function getTargets(): Collection
    {
        return $this->Targets;
    }

    public function addTarget(Targets $target): self
    {
        if (!$this->Targets->contains($target)) {
            $this->Targets[] = $target;
        }

        return $this;
    }

    public function removeTarget(Targets $target): self
    {
        $this->Targets->removeElement($target);

        return $this;
    }

    public function getMissionType(): ?MissionType
    {
        return $this->missionType;
    }

    public function setMissionType(?MissionType $missionType): self
    {
        $this->missionType = $missionType;

        return $this;
    }

    /**
     * @return Collection|Specialities[]
     */
    public function getRequiredSpecialities(): Collection
    {
        return $this->requiredSpecialities;
    }

    public function addRequiredSpeciality(Specialities $requiredSpeciality): self
    {
        if (!$this->requiredSpecialities->contains($requiredSpeciality)) {
            $this->requiredSpecialities[] = $requiredSpeciality;
        }

        return $this;
    }

    public function removeRequiredSpeciality(Specialities $requiredSpeciality): self
    {
        $this->requiredSpecialities->removeElement($requiredSpeciality);

        return $this;
    }
}
