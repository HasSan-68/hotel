<?php

namespace App\Controller;

use App\Entity\FosUser;
use App\Form\FosUserType;
use App\Repository\FosUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fos/user")
 */
class FosUserController extends AbstractController
{
    /**
     * @Route("/", name="Fos_user_index", methods={"GET"})
     */
    public function index(FosUserRepository $FosUserRepository): Response
    {
        return $this->render('Fos_user/index.html.twig', [
            'Fos_users' => $FosUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="Fos_User_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $FosUser = new FosUser();
        $form = $this->createForm(FosUserType::class, $FosUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($FosUser);
            $entityManager->flush();

            return $this->redirectToRoute('Fos_User_index');
        }

        return $this->render('Fos_User/new.html.twig', [
            'Fos_User' => $FosUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Fos_User_show", methods={"GET"})
     */
    public function show(FosUser $FosUser): Response
    {
        return $this->render('Fos_User/show.html.twig', [
            'Fos_User' => $FosUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="Fos_User_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FosUser $FosUser): Response
    {
        $form = $this->createForm(FosUserType::class, $FosUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Fos_User_index');
        }

        return $this->render('Fos_User/edit.html.twig', [
            'Fos_User' => $FosUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Fos_User_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FosUser $FosUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$FosUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($FosUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Fos_User_index');
    }
}
