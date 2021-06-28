<?php

namespace App\Controller\Admin;

use App\Entity\Offers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OffersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offers::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('offer_name'),
            TextField::new('offer_type'),
            TextField::new('offer_hosting'),
            TextField::new('offer_difficulty'),
            AssociationField::new('country'),
            TextEditorField::new('offer_description')->hideOnIndex(),
            AssociationField::new('step'),
            AssociationField::new('datesprices'),
            //N'est pas persisté dans la BDD
            TextField::new('imageFileStartPhoto')->setFormType(VichImageType::class)->hideOnIndex(),
            //Association avec le chemin de base
            ImageField::new('offer_start_photo')->setBasePath('/upload/offers/'),
            AssociationField::new('photo'),
            //Affiché uniquement au moment de la création
            TextField::new('imageFileMapPhoto')->setFormType(VichImageType::class)->onlyWhenCreating()->hideOnIndex(),
            ImageField::new('offer_map_photo')->setBasePath('/upload/offers/')->hideOnIndex(),
        ];
    }
    
}
