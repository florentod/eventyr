<?php

namespace App\Controller\Admin;

use App\Entity\DatesPrices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DatesPricesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DatesPrices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('start_date'),
            DateField::new('return_date'),
            NumberField::new('price'),
            AssociationField::new('offer')
        ];
    }
    
}
