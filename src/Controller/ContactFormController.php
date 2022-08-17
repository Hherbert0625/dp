<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Entity\ContactForm;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactFormController extends AbstractController
{
    /**
     * @Route("/index")
     */

    public function index(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {

        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactForm);
            $entityManager->flush();
            return new Response("Köszönjük szépen a kérdésedet.
            Válaszunkkal hamarosan keresünk a megadott e-mail címen");
        }

        return new Response($twig->render('/dp/show.html.twig', [
            'contact_form' => $form->createView()
        ]));
    }

}