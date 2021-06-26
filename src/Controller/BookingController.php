<?php

namespace App\Controller;

use App\Entity\Bookings;
use App\Entity\DatesPrices;
use App\Repository\BookingsRepository;
use App\Repository\DatesPricesRepository;
use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking/{datePrice}", name="booking")
     */
    public function booking($datePrice, DatesPricesRepository $datesPricesRepository): Response
    {
        $datePrice = $datesPricesRepository->findOneById($datePrice);


        $offer = $datePrice->getOffer();

        $booking = new Bookings();
        $booking->setUser($this->getUser());
        $booking->setDateprice($datePrice);

        dd($booking);

        return $this->render('booking/booking.html.twig', [
            //'booking' => $datesPricesRepository->findBy(),
            'datePrice' => $datePrice,
            'offer' => $offer,
        ]);        
    }
}
