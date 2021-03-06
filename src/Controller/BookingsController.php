<?php

namespace App\Controller;

use App\Entity\Bookings;
use App\Entity\DatesPrices;
use App\Form\BookingsType;
use App\Repository\BookingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bookings")
 */
class BookingsController extends AbstractController
{
    /**
     * @Route("/", name="bookings_index", methods={"GET"})
     */
    public function index(BookingsRepository $bookingsRepository): Response
    {
        return $this->render('bookings/index.html.twig', [
            'bookings' => $bookingsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bookings_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $booking = new Bookings();
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('bookings_index');
        }

        return $this->render('bookings/new.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bookings_show", methods={"GET"})
     */
    public function show(Bookings $booking): Response
    {
        return $this->render('bookings/show.html.twig', [
            'booking' => $booking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bookings_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bookings $booking): Response
    {
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bookings_index');
        }

        return $this->render('bookings/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bookings_delete", methods={"POST"})
     */
    public function delete(Request $request, Bookings $booking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bookings_index');
    }

    /**
     * @Route("/prevalidation/{id}", name="bookings_prevalidation", methods={"GET"})
     */
    public function preshow(DatesPrices $datesPrices): Response
    {
        return $this->render('bookings/prevalidation.html.twig', [
            'datesPrices' => $datesPrices,
        ]);
    }

    /**
     * @Route("/{id}/validation", name="bookings_validation", methods={"GET","POST"})
     */
    public function validation(Request $request, DatesPrices $datesPrices): Response
    {
        $booking = new Bookings();
        $booking->setDateprice($datesPrices);
        $booking->setUser( $this->getUser());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($booking);
        $entityManager->flush();


        return $this->render('bookings/validation.html.twig', [
            'booking' => $booking,
            
        ]);
    }
}
