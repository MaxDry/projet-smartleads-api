<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperationParticipationRepository")
 */
class OperationParticipation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Operation", inversedBy="Participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idOperation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contact", inversedBy="Participations")
     */
    private $idContact;

    public function __construct()
    {
        $this->idContact = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOperation(): ?Operation
    {
        return $this->idOperation;
    }

    public function setIdOperation(?Operation $idOperation): self
    {
        $this->idOperation = $idOperation;

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getIdContact(): Collection
    {
        return $this->idContact;
    }

    public function addIdContact(Contact $idContact): self
    {
        if (!$this->idContact->contains($idContact)) {
            $this->idContact[] = $idContact;
        }

        return $this;
    }

    public function removeIdContact(Contact $idContact): self
    {
        if ($this->idContact->contains($idContact)) {
            $this->idContact->removeElement($idContact);
        }

        return $this;
    }
}
