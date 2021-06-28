<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('created_at')->hideOnForm(),
            EmailField::new('email'),

            TextField::new('user_civility'),
            TextField::new('user_first_name'),
            TextField::new('user_last_name'),
            DateField::new('user_birthday'),
            TextField::new('user_nationality'),
            TextField::new('user_address'),
            TextField::new('user_city'),
            TextField::new('user_zipcode'),
            TextField::new('user_phone'),
            TextField::new('user_mobile'),
            TextField::new('user_passport_number'),
            TextField::new('user_passport_country'),
            DateField::new('user_passport_date'),
            TextField::new('user_photo'),
            TextField::new('user_select_comment'),
            TextField::new('user_photo'),
            TextField::new('user_photo'),
        ];
    }

    //Tri par la date de création plus récente 
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
                ->setDefaultSort(['created_at' => 'DESC']);
    }

}
