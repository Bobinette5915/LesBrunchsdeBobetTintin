<?php

namespace App\Controller;

use App\Classe\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PannierController extends AbstractController
{
    #[Route('/mon-panier', name: 'app_panier')]
    public function index(Panier $panier): Response
    {
        return $this->render('pannier/index.html.twig');
    }



    #[Route('/panier/add/{id}', name: 'app_add_panier')]
    public function add(Panier $panier, $id): Response
    {
        $panier->add($id);

        return $this->render('pannier/index.html.twig');
    }
}
