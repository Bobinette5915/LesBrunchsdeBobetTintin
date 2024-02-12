<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class InscriptionController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $encoder): Response
    {
        $notification = null;
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class, $utilisateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $utilisateur = $form->getData();

            $search_email = $this->entityManager->getRepository(Utilisateur::class)->findOneByEmail($utilisateur->getEmail());

            if (!$search_email) {
                $password = $encoder->hashPassword($utilisateur, $utilisateur->getPassword());
                $utilisateur->setPassword($password);

                $this->entityManager->persist($utilisateur);
                $entityManager->flush();

                $notification = 'Votre inscription est validée';
            } else {
                $notification = "L'email est déjà pris";
            }
        }
        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'InscriptionController',
            'notification' => $notification
        ]);
    }
}