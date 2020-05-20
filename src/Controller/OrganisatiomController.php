<?php

namespace App\Controller;

use App\Entity\Organisatiom;
use App\Form\OrganisatiomType;
use App\Repository\OrganisatiomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/organisatiom")
 */
class OrganisatiomController extends AbstractController
{
    /**
     * @Route("/", name="organisatiom_index", methods={"GET"})
     */
    public function index(OrganisatiomRepository $organisatiomRepository): Response
    {
        return $this->render('organisatiom/index.html.twig', [
            'organisatioms' => $organisatiomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="organisatiom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $organisatiom = new Organisatiom();
        $form = $this->createForm(OrganisatiomType::class, $organisatiom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($organisatiom);
            $entityManager->flush();

            return $this->redirectToRoute('organisatiom_index');
        }

        return $this->render('organisatiom/new.html.twig', [
            'organisatiom' => $organisatiom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisatiom_show", methods={"GET"})
     */
    public function show(Organisatiom $organisatiom): Response
    {
        return $this->render('organisatiom/show.html.twig', [
            'organisatiom' => $organisatiom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="organisatiom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Organisatiom $organisatiom): Response
    {
        $form = $this->createForm(OrganisatiomType::class, $organisatiom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organisatiom_index');
        }

        return $this->render('organisatiom/edit.html.twig', [
            'organisatiom' => $organisatiom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisatiom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Organisatiom $organisatiom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organisatiom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($organisatiom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('organisatiom_index');
    }
}
