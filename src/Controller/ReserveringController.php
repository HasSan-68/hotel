<?php

namespace App\Controller;

use App\Entity\Reservering;
use App\Form\ReserveringType;
use App\Repository\ReserveringRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservering")
 */
class ReserveringController extends AbstractController
{
    /**
     * @Route("/", name="reservering_index", methods={"GET"})
     */
    public function index(ReserveringRepository $reserveringRepository): Response
    {
        return $this->render('reservering/index.html.twig', [
            'reserverings' => $reserveringRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservering_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservering = new Reservering();
        $form = $this->createForm(ReserveringType::class, $reservering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservering);
            $entityManager->flush();

            return $this->redirectToRoute('reservering_index');
        }

        return $this->render('reservering/new.html.twig', [
            'reservering' => $reservering,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservering_show", methods={"GET"})
     */
    public function show(Reservering $reservering): Response
    {
        return $this->render('reservering/show.html.twig', [
            'reservering' => $reservering,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="reservering_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservering $reservering): Response
    {
        $form = $this->createForm(ReserveringType::class, $reservering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservering_index');
        }

        return $this->render('reservering/edit.html.twig', [
            'reservering' => $reservering,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservering_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reservering $reservering): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservering->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservering);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservering_index');
    }

    public function reservering_index()
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('default/mypdf.html.twig', [
            'title' => "Welcome to our PDF Test"
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }
}
