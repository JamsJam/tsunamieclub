<?php

namespace App\Controller;

use App\Entity\Urgence;
use App\Form\UrgenceType;
use App\Repository\UrgenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/urgence")
 */
class UrgenceController extends AbstractController
{
    /**
     * @Route("/", name="app_urgence_index", methods={"GET"})
     */
    public function index(UrgenceRepository $urgenceRepository): Response
    {
        return $this->render('urgence/index.html.twig', [
            'urgences' => $urgenceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_urgence_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UrgenceRepository $urgenceRepository): Response
    {
        $urgence = new Urgence();
        $form = $this->createForm(UrgenceType::class, $urgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $urgenceRepository->add($urgence, true);

            return $this->redirectToRoute('app_urgence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('urgence/new.html.twig', [
            'urgence' => $urgence,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_urgence_show", methods={"GET"})
     */
    public function show(Urgence $urgence): Response
    {
        return $this->render('urgence/show.html.twig', [
            'urgence' => $urgence,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_urgence_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Urgence $urgence, UrgenceRepository $urgenceRepository): Response
    {
        $form = $this->createForm(UrgenceType::class, $urgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $urgenceRepository->add($urgence, true);

            return $this->redirectToRoute('app_urgence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('urgence/edit.html.twig', [
            'urgence' => $urgence,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_urgence_delete", methods={"POST"})
     */
    public function delete(Request $request, Urgence $urgence, UrgenceRepository $urgenceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$urgence->getId(), $request->request->get('_token'))) {
            $urgenceRepository->remove($urgence, true);
        }

        return $this->redirectToRoute('app_urgence_index', [], Response::HTTP_SEE_OTHER);
    }
}
