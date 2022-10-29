<?php

namespace App\Controller;

use App\Entity\Administratif;
use App\Form\AdministratifType;
use App\Repository\AdministratifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administratif")
 */
class AdministratifController extends AbstractController
{
    /**
     * @Route("/", name="app_administratif_index", methods={"GET"})
     */
    public function index(AdministratifRepository $administratifRepository): Response
    {
        return $this->render('administratif/index.html.twig', [
            'administratifs' => $administratifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_administratif_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AdministratifRepository $administratifRepository): Response
    {
        $administratif = new Administratif();
        $form = $this->createForm(AdministratifType::class, $administratif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $administratifRepository->add($administratif, true);

            return $this->redirectToRoute('app_administratif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administratif/new.html.twig', [
            'administratif' => $administratif,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_administratif_show", methods={"GET"})
     */
    public function show(Administratif $administratif): Response
    {
        return $this->render('administratif/show.html.twig', [
            'administratif' => $administratif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_administratif_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Administratif $administratif, AdministratifRepository $administratifRepository): Response
    {
        $form = $this->createForm(AdministratifType::class, $administratif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $administratifRepository->add($administratif, true);

            return $this->redirectToRoute('app_administratif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administratif/edit.html.twig', [
            'administratif' => $administratif,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_administratif_delete", methods={"POST"})
     */
    public function delete(Request $request, Administratif $administratif, AdministratifRepository $administratifRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$administratif->getId(), $request->request->get('_token'))) {
            $administratifRepository->remove($administratif, true);
        }

        return $this->redirectToRoute('app_administratif_index', [], Response::HTTP_SEE_OTHER);
    }
}
