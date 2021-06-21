<?php

namespace App\Entity;

use App\Repository\DatesPricesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DatesPricesRepository::class)
 */
class DatesPrices
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offers::class, inversedBy="datesprices")
     */
    private $offer;

    /**
     * @ORM\OneToMany(targetEntity=Bookings::class, mappedBy="dateprice")
     */
    private $bookings;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="date")
     */
    private $start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $return_date;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffer(): ?offers
    {
        return $this->offer;
    }

    public function setOffer(?offers $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * @return Collection|Bookings[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Bookings $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setDateprice($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getDateprice() === $this) {
                $booking->setDateprice(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(\DateTimeInterface $return_date): self
    {
        $this->return_date = $return_date;

        return $this;
    }

    //! réflechir     
    public function __toString() : ?string     
    {         
        return 'id : ' . $this->id . ' prix : ' . $this->price . '€ du ' . date_format($this->start_date, 'd-m-Y') . ' à ' . date_format($this->return_date, 'd-m-Y');     
    }
}
