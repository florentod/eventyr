<?php

namespace App\Entity;

use App\Repository\BookingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingsRepository::class)
 */
class Bookings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment_content;

    /**
     * @ORM\ManyToOne(targetEntity=DatesPrices::class, inversedBy="bookings")
     */
    private $dateprice;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="booking")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentContent(): ?string
    {
        return $this->comment_content;
    }

    public function setCommentContent(?string $comment_content): self
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    public function getDateprice(): ?datesprices
    {
        return $this->dateprice;
    }

    public function setDateprice(?datesprices $dateprice): self
    {
        $this->dateprice = $dateprice;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    } 
}
