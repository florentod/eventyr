<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Form\OffersType;
use App\Repository\OffersRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offers")
 */
class OffersController extends AbstractController
{
    /**
     * @Route("/", name="offers_index", methods={"GET"})
     */
    public function index(OffersRepository $offersRepository): Response
    {
        return $this->render('offers/index.html.twig', [
            'offers' => $offersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="offers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $offer = new Offers();
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offer);
            $entityManager->flush();

            return $this->redirectToRoute('offers_index');
        }

        return $this->render('offers/new.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offers_show", methods={"GET"})
     */
    public function show(Offers $offer): Response
    {
        return $this->render('offers/show.html.twig', [
            'offer' => $offer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Offers $offer): Response
    {
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offers_index');
        }

        return $this->render('offers/edit.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offers_delete", methods={"POST"})
     */
    public function delete(Request $request, Offers $offer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($offer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offers_index');
    }

    /**
     * @Route("/api/search/{query}", methods={"GET"})
     */
    public function search($query, OffersRepository $offersRepository, LoggerInterface $logger)
    {
        //$this->denyAccessUnlessGranted("ROLE_USER");

        // $listAuteur = $auteurRepository->findBy(array(), array('nom' => 'DESC'));
        // $listAuteur = $auteurRepository->findAllArray();

        // $listAuteur = $auteurRepository->findAllArrayWithBooks($query);
        $offers = $offersRepository->findAllArray($query);

        $logger->info($query);


        // return $this->json($listAuteur);
        return new JsonResponse($offers);
    }
}
