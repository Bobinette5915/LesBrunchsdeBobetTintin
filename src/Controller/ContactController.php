<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        $notification = null;
        $form= $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash('notice', 'Votre message a bien été pris en compte, nous reviendrons vers vous dès que possible !');

            $notification = "Votre message a bien été pris en compte, nous reviendrons vers vous dès que possible !";


            //envoi un mail aux admins avec le text du contact
                $mail = new Mail();
                $objet = "Nouvelle demande de contact";
                $contenue = "Bonjour <br>vous avez recu un nouveau message de la part de ".$form->get('nom')->getData()." ".$form->get('prenom')->getData()." sur Les Brunchs de Bob et Tintin <br><hr>
                Voici le message : <br><br>".$form->get('Message')->getData()."<br> <hr> <br>Répondez à cette adresse : ".$form->get('email')->getData();
                $mail -> send('bob.et.tintin@gmail.com', 'Les Brunchs de Bob et Tintin', 'bob.et.tintin@gmail.com', $form->get('nom')->getData(),  $objet, $contenue);

        }

        return $this->render('contact/index.html.twig',[
            'form'=> $form->createView(),
            'notification' => $notification,
        ]);
    }
}
