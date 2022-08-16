<?php

namespace App\Controller;

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
     * @Route("/show")
     */

    public function show(Environment $twig, Request $request)
    {
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);
        return new Response($twig->render('dp/show.html.twig', [
            'contact_form' => $form->createView()
        ]));
    }


}