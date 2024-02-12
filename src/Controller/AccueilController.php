<?php

namespace App\Controller;

use App\Entity\Boxs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class AccueilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {

        $boxs = $this->entityManager->getRepository(Boxs::class)->findAll();

        return $this->render('accueil/index.html.twig', [
            'Boxs' => $boxs,
        ]);
    }
}
