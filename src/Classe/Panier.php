<?php


namespace App\Classe;

use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;

class Panier
{
    private $requestStack;
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->entityManager = $entityManager;
    }

    public function add($id)
    {
        

    }}
