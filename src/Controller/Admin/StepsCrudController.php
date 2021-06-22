<?php

namespace App\Controller\Admin;

use App\Entity\Steps;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StepsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Steps::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('step_name'),
            NumberField::new('step_order'),
            TextEditorField::new('step_description'),
            AssociationField::new('offers'),
        ];
    }
    
}
