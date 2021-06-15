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
}
