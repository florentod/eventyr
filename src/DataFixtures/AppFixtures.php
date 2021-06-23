<?php

namespace App\DataFixtures;

use App\Entity\Countries;
use App\Entity\DatesPrices;
use App\Entity\Offers;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création de l'Admin

        $admin = new User();

        $admin->setEmail('admin@bob.fr')
             ->setUserCivility($faker->title('male', 'female'))
             ->setUserFirstName($faker->firstName())
             ->setUserLastName($faker->lastName())
             ->setUserBirthday($faker->dateTimeBetween('-65 years', '-18 years'))
             ->setUserNationality($faker->country())
             ->setUserAddress($faker->address())
             ->setUserCity($faker->city())
             ->setUserZipcode($faker->countryCode())
             ->setUserPhone($faker->countryCode())
             ->setUserMobile($faker->countryCode())
             ->setUserPassportNumber($faker->bankAccountNumber())
             ->setUserPassportCountry($faker->country())
             ->setUserPassportDate($faker->dateTimeBetween('-10 years', '-1 days'))
             ->setCreatedAt($faker->dateTimeBetween('-1 year', 'now'))
             ->setRoles(['ROLE_ADMIN']);

        $password = $this->encoder->encodePassword($admin, 'password');
        $admin->setPassword($password);


        $manager->persist($admin);

        // Création des Utilisateurs
        for ($i=0; $i < 10; $i++) {

        $user = new User();

        $user->setEmail($faker->email())
             ->setUserCivility($faker->title('male', 'female'))
             ->setUserFirstName($faker->firstName())
             ->setUserLastName($faker->lastName())
             ->setUserBirthday($faker->dateTimeBetween('-65 years', '-18 years'))
             ->setUserNationality($faker->country())
             ->setUserAddress($faker->address())
             ->setUserCity($faker->city())
             ->setUserZipcode($faker->countryCode())
             ->setUserPhone($faker->countryCode())
             ->setUserMobile($faker->countryCode())
             ->setUserPassportNumber($faker->bankAccountNumber())
             ->setUserPassportCountry($faker->country())
             ->setUserPassportDate($faker->dateTimeBetween('-10 years', '-1 days'))
             ->setCreatedAt($faker->dateTimeBetween('-1 year', 'now'))
             ->setRoles(['ROLE_USER']);

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        }

        // //Création de pays
        // for ($i=0; $i < 10; $i++) {
        //     $country = new Countries();

        //     $country->setCountryName($faker->country());
        //             //->setCountryContinent($faker->word(1, true));

        //     //$manager->persist($country);
        // }

        //Création de 10 offers
        for ($i=0; $i < 10; $i++) {
            $offer = new Offers();

            $offer->setOfferName($faker->words(3, true))
                  ->setOfferType($faker->words(1, true))
                  ->setOfferDifficulty($faker->word())
                  //->setOfferSlug($faker->slug(3))
                  ->setOfferDescription($faker->text(350))
                  ->setOfferHosting($faker->word())
                  //->setHostingDescription($faker->text(250))
                  //->setMealType($faker->word())
                  //->setMealDescription($faker->text(100))
                  ->setOfferMapPhoto($faker->word())
                  ->setOfferStartPhoto('placeholder-offer-default.jpeg');
                  //->setStartingPoint($faker->city())
                  //->setArrivalPoint($faker->city())
                  //->setTransportCompany($faker->words(3, true))
                  //->setCountry($country);
                  //($faker->randomElement($country));
        
            $manager->persist($offer);
        }

        // Création des DatesPrix
        for ($j=0; $j < 30; $j++) {
            $datePrice = new DatesPrices();
            
            $datePrice->setPrice($faker->randomFloat(99000, 9900, null))
                      ->setStartDate($faker->dateTimeBetween('+1 month', '+1 year'))
                      ->setReturnDate($faker->dateTimeBetween('+1 month', '+1 year'))
                      ->setOffer($offer);

            $manager->persist($datePrice);
            }
    

    $manager->flush();   

    }
}