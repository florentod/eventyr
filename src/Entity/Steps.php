<?php

namespace App\Entity;

use App\Repository\StepsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StepsRepository::class)
 */
class Steps
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
    private $step_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $step_order;

    /**
     * @ORM\Column(type="text")
     */
    private $step_description;

    /**
     * @ORM\ManyToOne(targetEntity=Offers::class, inversedBy="step")
     */
    private $offers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStepName(): ?string
    {
        return $this->step_name;
    }

    public function setStepName(string $step_name): self
    {
        $this->step_name = $step_name;

        return $this;
    }

    public function getStepOrder(): ?int
    {
        return $this->step_order;
    }

    public function setStepOrder(int $step_order): self
    {
        $this->step_order = $step_order;

        return $this;
    }

    public function getStepDescription(): ?string
    {
        return $this->step_description;
    }

    public function setStepDescription(string $step_description): self
    {
        $this->step_description = $step_description;

        return $this;
    }

    public function getOffers(): ?Offers
    {
        return $this->offers;
    }

    public function setOffers(?Offers $offers): self
    {
        $this->offers = $offers;

        return $this;
    }

    public function __toString()
    {
        return $this->step_name;
    }
}
