<?php

namespace App\Entity;

use App\Repository\OffersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="offer")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Steps::class, mappedBy="offers")
     */
    private $step;

    /**
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="offers")
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="offers")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=Datesprices::class, mappedBy="offer")
     */
    private $datesprices;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->step = new ArrayCollection();
        $this->photo = new ArrayCollection();
        $this->datesprices = new ArrayCollection();
    }

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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addOffer($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeOffer($this);
        }

        return $this;
    }

    /**
     * @return Collection|steps[]
     */
    public function getStep(): Collection
    {
        return $this->step;
    }

    public function addStep(steps $step): self
    {
        if (!$this->step->contains($step)) {
            $this->step[] = $step;
            $step->setOffers($this);
        }

        return $this;
    }

    public function removeStep(steps $step): self
    {
        if ($this->step->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getOffers() === $this) {
                $step->setOffers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|photos[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(photos $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setOffers($this);
        }

        return $this;
    }

    public function removePhoto(photos $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getOffers() === $this) {
                $photo->setOffers(null);
            }
        }

        return $this;
    }

    public function getCountry(): ?countries
    {
        return $this->country;
    }

    public function setCountry(?countries $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Datesprices[]
     */
    public function getDatesprices(): Collection
    {
        return $this->datesprices;
    }

    public function addDatesprice(Datesprices $datesprice): self
    {
        if (!$this->datesprices->contains($datesprice)) {
            $this->datesprices[] = $datesprice;
            $datesprice->setOffer($this);
        }

        return $this;
    }

    public function removeDatesprice(Datesprices $datesprice): self
    {
        if ($this->datesprices->removeElement($datesprice)) {
            // set the owning side to null (unless already changed)
            if ($datesprice->getOffer() === $this) {
                $datesprice->setOffer(null);
            }
        }

        return $this;
    }
}
