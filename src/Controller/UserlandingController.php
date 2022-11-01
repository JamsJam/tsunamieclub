<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserlandingController extends AbstractController
{
    /**
     * @Route("/userlanding", name="app_userlanding")
     */
    public function index(): Response
    {
        return $this->render('userlanding/index.html.twig', [
            'controller_name' => 'UserlandingController',
        ]);
    }
}
