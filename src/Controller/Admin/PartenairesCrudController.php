<?php

namespace App\Controller\Admin;

use App\Entity\Partenaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartenairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaires::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Nom'),
            TextField::new('Adresse'),
            TextField::new('Email'),
            TextareaField::new('description'),
            ImageField::new("logo")
            ->setBasePath('assets/images/')
            ->setUploadDir('public/assets/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
    
}
