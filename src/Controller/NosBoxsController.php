<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Boxs;
use App\Entity\Ingredients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NosBoxsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/nos-boxs', name: 'app_nos_boxs')]
    public function index(): Response
    {



        $boxs = $this->entityManager->getRepository(Boxs::class)->findAll();


        return $this->render('nos_boxs/index.html.twig', [
            'Boxs' => $boxs,
        ]);
    }

    #[Route('/ma-box/{slug}', name: 'app_ma_box')]
    public function show($slug): Response
    {


        $box = $this->entityManager->getRepository(Boxs::class)->findOneBy(['Slug' => $slug]);
        $ingredients = $this->entityManager->getRepository(Ingredients::class)->findAll();

        $BoxIngredients = $box->getIngredients();
        $list_ingredient = [];



        foreach ($BoxIngredients as $ingredient) {
            $list_ingredient[] = $ingredient;
        }
        if (!$box) {
            return $this->redirectToRoute('app_nos_boxs');
        }

        return $this->render('nos_boxs/personalisation.html.twig', [
            'Box' => $box,
            'ingredients' => $list_ingredient,
            'liste_ingredients' => $ingredients,
        ]);
    }
}
