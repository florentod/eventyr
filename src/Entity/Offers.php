<?php

namespace App\Entity;

use App\Repository\OffersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
//Gérable par Vich Uploader et File interface
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=OffersRepository::class)
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="offer_images", fileNameProperty="offer_map_photo")
     * @var File
     */
    private $imageFileMapPhoto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_start_photo;

    /**
     * @Vich\UploadableField(mapping="offer_images", fileNameProperty="offer_start_photo")
     * @var File
     */
    private $imageFileStartPhoto;

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
     * @ORM\OneToMany(targetEntity=DatesPrices::class, mappedBy="offer")
     */
    private $datesprices;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeHosting;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionHosting;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeFood;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionFood;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $startPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $endPoint;

    /**
     * @ORM\Column(type="text")
     */
    private $recap;

    /**
     * @ORM\Column(type="text")
     */
    private $brief;

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

    //! Gettors et Settors de géstion des images via Vich_Uploader
    public function setImageFileMapPhoto(File $file = null)
    {
        $this->imageFileMapPhoto = $file;

    }

    public function getImageFileMapPhoto()
    {
        return $this->imageFileMapPhoto;
    }

    public function setImageFileStartPhoto(File $file = null)
    {
        $this->imageFileStartPhoto = $file;

    }

    public function getImageFileStartPhoto()
    {
        return $this->imageFileStartPhoto;
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

    public function __toString(){
        return $this->offer_name;
    }

    public function getTypeHosting(): ?string
    {
        return $this->typeHosting;
    }

    public function setTypeHosting(string $typeHosting): self
    {
        $this->typeHosting = $typeHosting;

        return $this;
    }

    public function getDescriptionHosting(): ?string
    {
        return $this->descriptionHosting;
    }

    public function setDescriptionHosting(string $descriptionHosting): self
    {
        $this->descriptionHosting = $descriptionHosting;

        return $this;
    }

    public function getTypeFood(): ?string
    {
        return $this->typeFood;
    }

    public function setTypeFood(string $typeFood): self
    {
        $this->typeFood = $typeFood;

        return $this;
    }

    public function getDescriptionFood(): ?string
    {
        return $this->descriptionFood;
    }

    public function setDescriptionFood(string $descriptionFood): self
    {
        $this->descriptionFood = $descriptionFood;

        return $this;
    }

    public function getStartPoint(): ?string
    {
        return $this->startPoint;
    }

    public function setStartPoint(string $startPoint): self
    {
        $this->startPoint = $startPoint;

        return $this;
    }

    public function getEndPoint(): ?string
    {
        return $this->endPoint;
    }

    public function setEndPoint(string $endPoint): self
    {
        $this->endPoint = $endPoint;

        return $this;
    }

    public function getRecap(): ?string
    {
        return $this->recap;
    }

    public function setRecap(string $recap): self
    {
        $this->recap = $recap;

        return $this;
    }

    public function getBrief(): ?string
    {
        return $this->brief;
    }

    public function setBrief(string $brief): self
    {
        $this->brief = $brief;

        return $this;
    }
}
