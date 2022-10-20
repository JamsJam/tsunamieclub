<?php

namespace App\Controller;


use App\Service\ApiKey;
use App\Entity\Adherant;
use App\Service\MailJet;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use App\Repository\AdherantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;


class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    private VerifyEmailHelperInterface $verifyEmailHelper;
    private MailerInterface $mailer;

    public function __construct(EmailVerifier $emailVerifier, VerifyEmailHelperInterface $helper,MailerInterface $mailer)
    {
        $this->emailVerifier = $emailVerifier;
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, AdherantRepository $ar,ApiKey $mjKey, VerifyEmailHelperInterface $helper,string $verifyEmailRouteName = "app_verify_email"): Response
    {
        $user = new Adherant();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $ar->add($user, true);
            
            //? =================================================
            //*         *********** EMAIL ************
            //? =================================================


            //! Recuperation de l'API MailJet
            $key = $mjKey->getKey();
            $secret_key = $mjKey->getSecretKey();

            $signatureComponents = $helper->generateSignature(
                $verifyEmailRouteName,
                $user->getId(),
                $user->getEmail()
            );


            $email = new MailJet();
            $email->send(
                $key,
                $secret_key,
                "j.antoine971@hotmail.com", //?Email  
                "NewUser", //? Nom
                "Bienvenue sur notre site", //? Subject 
                //? Contenue
                "<h1>Hi! Please confirm your email!</h1><p>Please confirm your email address by clicking the following link: <br><br><a href=\"{{var:signedUrl:\"\"}}\">Confirm my Email</a>.</p><p>Cheers!</p>",
                //? Variable
                [
                    'signedUrl' => $signatureComponents->getSignedUrl(),
                    // 'expiresAtMessageKey' => $signatureComponents->getExpirationMessageKey(),
                    // 'expiresAtMessageData' => $signatureComponents->getExpirationMessageData()
                ]);
                

        //? =================================================
        //*         *********** FIN EMAIL ************
        //? =================================================
        




            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        //TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('confirm', 'Your email address has been verified.');

        return $this->redirectToRoute('app_home');
    }
}
