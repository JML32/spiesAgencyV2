<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 */
class Agents
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $identificationId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\ManyToMany(targetEntity=Specialities::class, inversedBy="Agents")
     */
    private $Specialities;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, inversedBy="Agents")
     */
    private $Missions;

    public function __construct()
    {
        $this->Specialities = new ArrayCollection();
        $this->Missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getIdentificationId(): ?int
    {
        return $this->identificationId;
    }

    public function setIdentificationId(int $identificationId): self
    {
        $this->identificationId = $identificationId;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return Collection|Specialities[]
     */
    public function getSpecialities(): Collection
    {
        return $this->Specialities;
    }

    public function addSpeciality(Specialities $speciality): self
    {
        if (!$this->Specialities->contains($speciality)) {
            $this->Specialities[] = $speciality;
        }

        return $this;
    }

    public function removeSpeciality(Specialities $speciality): self
    {
        $this->Specialities->removeElement($speciality);

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
}
