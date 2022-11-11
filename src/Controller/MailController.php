<?php

namespace App\Controller;

use App\Entity\Mail;
use App\Form\MailType;
use App\Message\MailNotification;
use App\Repository\MailRepository;
use App\Repository\AdherantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/mail")
 */
class MailController extends AbstractController
{
    /**
     * @Route("/", name="app_mail_index", methods={"GET"})
     */
    public function index(MailRepository $mailRepository): Response
    {
        return $this->render('mail/index.html.twig', [
            'mails' => $mailRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_mail_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MailRepository $mailRepository, MessageBusInterface $bus): Response
    {
        $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($mail->getMessage());
            //initialisation tableau des destinataire
            $toAddresses = [];

            foreach ($mail->getDestinataire() as $destinataire) {
                $destiMail = $destinataire->getEmail();
                
            
//? =================================================
//*         *********** EMAIL ************
//? =================================================
                $content = $mail->getMessage();
            $email = new MailNotification(
//todo                 1) Sujet
            $mail->getSujet(),
//todo                 2) destinataire
                        $destiMail,
//todo                 3) expeditaire
            "contact@tsunami.fr",
//todo                 4) template
            "mail/template_mail.html.twig",
//todo                 5) parametres
                [
                    'content' => $content,
                    'adherant'=> $destinataire
                ]
            );
                        $bus->dispatch($email);
    
//? =================================================
//*         *********** FIN EMAIL ************
//? =================================================
            }
        
        $mailRepository->add($mail, true);

            return $this->redirectToRoute('app_mail_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mail/new.html.twig', [
            'mail' => $mail,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mail_show", methods={"GET"})
     */
    public function show(Mail $mail): Response
    {
        return $this->render('mail/show.html.twig', [
            'mail' => $mail,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_mail_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Mail $mail, MailRepository $mailRepository): Response
    {
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $mailRepository->add($mail, true);

            return $this->redirectToRoute('app_mail_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mail/edit.html.twig', [
            'mail' => $mail,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_mail_delete", methods={"POST"})
     */
    public function delete(Request $request, Mail $mail, MailRepository $mailRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mail->getId(), $request->request->get('_token'))) {
            $mailRepository->remove($mail, true);
        }

        return $this->redirectToRoute('app_mail_index', [], Response::HTTP_SEE_OTHER);
    }


        /**
     * @Route("/api/fetch/adherant", name="app_json_adherant")
     */
    public function adherantJson(SerializerInterface $serializer, AdherantRepository $adherantRepository): JsonResponse
    {
        
        $adherant = $adherantRepository->findAll();
        
        
        
        $jsonContent = $serializer
                                ->serialize(
                                        $adherant,
                                        'json',
                                        [
                                            'groups' => [
                                                'adherant','adherant-roleClub','adherant-administratif','adherant-grade'
                                                ]
                                            ]
                                        );
        

        return new JsonResponse($jsonContent, JsonResponse::HTTP_OK, [
            'groups' => 'groups',
        ], true) ;        
    }
}
