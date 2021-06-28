<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
//!Gérable par Vich Uploader et File interface
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=PhotosRepository::class)
 * @Vich\Uploadable
 */
class Photos
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
    private $photo;

    //! Vich_uploder : voir le Doc
    /**
     * @Vich\UploadableField(mapping="offer_images", fileNameProperty="photo")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=Offers::class, inversedBy="photo")
     */
    private $offers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

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

    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;

        if ($file) {
            $this->createdAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function __toString()
    {
        return $this->photo;
    }
}
