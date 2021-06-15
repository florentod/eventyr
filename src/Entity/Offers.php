<?php

namespace App\Entity;

use App\Repository\OffersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffersRepository::class)
 */
class Offers
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
    private $offer_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_hosting;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_difficulty;

    /**
     * @ORM\Column(type="text")
     */
    private $offer_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_map_photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_start_photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferName(): ?string
    {
        return $this->offer_name;
    }

    public function setOfferName(string $offer_name): self
    {
        $this->offer_name = $offer_name;

        return $this;
    }

    public function getOfferType(): ?string
    {
        return $this->offer_type;
    }

    public function setOfferType(string $offer_type): self
    {
        $this->offer_type = $offer_type;

        return $this;
    }

    public function getOfferHosting(): ?string
    {
        return $this->offer_hosting;
    }

    public function setOfferHosting(string $offer_hosting): self
    {
        $this->offer_hosting = $offer_hosting;

        return $this;
    }

    public function getOfferDifficulty(): ?string
    {
        return $this->offer_difficulty;
    }

    public function setOfferDifficulty(string $offer_difficulty): self
    {
        $this->offer_difficulty = $offer_difficulty;

        return $this;
    }

    public function getOfferDescription(): ?string
    {
        return $this->offer_description;
    }

    public function setOfferDescription(string $offer_description): self
    {
        $this->offer_description = $offer_description;

        return $this;
    }

    public function getOfferMapPhoto(): ?string
    {
        return $this->offer_map_photo;
    }

    public function setOfferMapPhoto(string $offer_map_photo): self
    {
        $this->offer_map_photo = $offer_map_photo;

        return $this;
    }

    public function getOfferStartPhoto(): ?string
    {
        return $this->offer_start_photo;
    }

    public function setOfferStartPhoto(string $offer_start_photo): self
    {
        $this->offer_start_photo = $offer_start_photo;

        return $this;
    }
}
