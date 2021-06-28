<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Offers::class, mappedBy="country")
     */
    private $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

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

    /**
     * @return Collection|Offers[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offers $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setCountry($this);
        }

        return $this;
    }

    public function removeOffer(Offers $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getCountry() === $this) {
                $offer->setCountry(null);
            }
        }

        return $this;
    }
}
