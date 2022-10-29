<?php

namespace App\Controller;

use App\Entity\RoleClub;
use App\Form\RoleClubType;
use App\Repository\RoleClubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/role/club")
 */
class RoleClubController extends AbstractController
{
    /**
     * @Route("/", name="app_role_club_index", methods={"GET"})
     */
    public function index(RoleClubRepository $roleClubRepository): Response
    {
        return $this->render('role_club/index.html.twig', [
            'role_clubs' => $roleClubRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_role_club_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RoleClubRepository $roleClubRepository): Response
    {
        $roleClub = new RoleClub();
        $form = $this->createForm(RoleClubType::class, $roleClub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $roleClubRepository->add($roleClub, true);

            return $this->redirectToRoute('app_role_club_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('role_club/new.html.twig', [
            'role_club' => $roleClub,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_role_club_show", methods={"GET"})
     */
    public function show(RoleClub $roleClub): Response
    {
        return $this->render('role_club/show.html.twig', [
            'role_club' => $roleClub,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_role_club_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RoleClub $roleClub, RoleClubRepository $roleClubRepository): Response
    {
        $form = $this->createForm(RoleClubType::class, $roleClub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $roleClubRepository->add($roleClub, true);

            return $this->redirectToRoute('app_role_club_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('role_club/edit.html.twig', [
            'role_club' => $roleClub,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_role_club_delete", methods={"POST"})
     */
    public function delete(Request $request, RoleClub $roleClub, RoleClubRepository $roleClubRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$roleClub->getId(), $request->request->get('_token'))) {
            $roleClubRepository->remove($roleClub, true);
        }

        return $this->redirectToRoute('app_role_club_index', [], Response::HTTP_SEE_OTHER);
    }
}
