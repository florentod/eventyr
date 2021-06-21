<?php

namespace App\Controller\Admin;

use App\Entity\Photos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PhotosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Photos::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('photo'),
            AssociationField::new('offers')
        ];
    }
}
