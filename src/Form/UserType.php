<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('Username')
            ->add('user_civility')
            ->add('user_first_name')
            ->add('user_last_name')
            ->add('user_birthday')
            ->add('user_nationality')
            ->add('user_address')
            ->add('user_city')
            ->add('user_zipcode')
            ->add('user_phone')
            ->add('user_mobile')
            ->add('user_passport_number')
            ->add('user_passport_country')
            ->add('user_passport_date')
            ->add('user_photo')
            ->add('user_select_comment')
            ->add('isVerified')
            ->add('created_at')
            ->add('offer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
