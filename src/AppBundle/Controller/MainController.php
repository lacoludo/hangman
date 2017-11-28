<?php

namespace AppBundle\Controller;

use AppBundle\Contact\ContactRequestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/contact", name="app_contact")
     * @Method("GET|POST")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactRequestType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData()->toSwiftMessage($this->getParameter('contact_recipient'));
            $this->get('mailer')->send($message);
            $this->addFlash('notice', 'contact.email_sent');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
