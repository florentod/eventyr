<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
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
    private $Country_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Continent_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryName(): ?string
    {
        return $this->Country_name;
    }

    public function setCountryName(string $Country_name): self
    {
        $this->Country_name = $Country_name;

        return $this;
    }

    public function getContinentName(): ?string
    {
        return $this->Continent_name;
    }

    public function setContinentName(string $Continent_name): self
    {
        $this->Continent_name = $Continent_name;

        return $this;
    }
}
