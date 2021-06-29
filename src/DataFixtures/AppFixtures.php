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
             ->setUserPhone($faker->phoneNumber())
             ->setUserMobile($faker->phoneNumber())
             ->setUserPassportNumber($faker->bankAccountNumber())
             ->setUserPassportCountry($faker->country())
             ->setUserPassportDate($faker->dateTimeBetween('now', '+10 years'))
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
             ->setUserPhone($faker->phoneNumber())
             ->setUserMobile($faker->phoneNumber())
             ->setUserPassportNumber($faker->bankAccountNumber())
             ->setUserPassportCountry($faker->country())
             ->setUserPassportDate($faker->dateTimeBetween('now', '+10 years'))
             ->setCreatedAt($faker->dateTimeBetween('-1 year', 'now'))
             ->setRoles(['ROLE_USER']);

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        }

        $continents = ['Amérique du Nord', 'Amérique du Sud', 'Antarctique', 'Asie', 'Europe', 'Afrique', 'Océanie'];

        for ($i=0; $i < 30; $i++) {

        //Création de pays
        $country = new Countries();

        if ($i == 0) {

        $country->setCountryName('Nouvelle-Zélande')
                ->setContinentName('Océanie');

        } else {

            $country->setCountryName($faker->country())
                    ->setContinentName($faker->randomElement($continents));
        }

        $manager->persist($country);

        //Création des offers
            $offer = new Offers();

            if ($i == 0) {

                $offer->setOfferName('SENSATIONS FORTES GARANTIES
                EN NOUVELLE-ZÉLANDE')
                  ->setOfferType('extrême')
                  ->setOfferDifficulty('difficile')
                  ->setOfferDescription('Saut à l’élastique à 134 mètres, tyrolienne d’une hauteur de 30 étages qui propulse ses visiteurs à une vitesse de 70 km/h, heli-biking (être déposé en hélicoptère au sommet d’une montagne afin de la descendre en vélo) dans la chaîne de montagnes des Remarkables, zorbing (descente d’une colline à l’intérieur d’une sphère coussinée), canyon swinging (se lancer dans un canyon afin de se balancer au bout d’un câble), saut en parachute, jetboating (bateau hyper rapide qui sillonne les eaux au fond d’un canyon) et plus encore !')
                  ->setOfferHosting('HÔTELS')
                  ->setTypeHosting('Hébergement')
                  ->setDescriptionHosting("Vous serez hébergé dans la ville de Queenstown à l’hôtel Eichardt's (l'hôtel privé le plus primé du pays) dans une suite offrant une vue imprenable sur le lac Wakatipu et les montagnes environnantes. Vous pourrez également profitez du SPA, avec jacuzzi extérieur et le sauna privé.")
                  ->setTypeFood('Repas')
                  ->setDescriptionFood('Vous aurez le choix de prendre vos repas :
                  <br>
                  Eichardts Bar – Bar à tapas servant des spécialités de la cuisine locale. Sert le déjeuner et le dîner')
                  ->setOfferMapPhoto($faker->word())
                  ->setOfferStartPhoto('placeholder-offer-default.jpeg')
                  ->setStartPoint($faker->city())
                  ->setEndPoint($faker->city())
                  ->setRecap("Sports extrêmes dans la région de Queenstown,
                Nouvelle-Zélande")
                  ->setBrief('Située dans la région d’Otago, sur l’Île du Sud, la ville de Queenstown est très certainement la capitale mondiale des sports extrêmes. Une quantité incroyable d’activités au haut taux de sensations fortes s’offrent effectivement à vous dans cette ville.')
                  ->setCountry($country);
        
            } else {

            $levels = ['facile', 'normal', 'difficile'];

            $offer->setOfferName($faker->words(3, true))
   
                  ->setOfferType($faker->randomElement($levels))
                  ->setOfferDifficulty($faker->randomElement($levels))
                  ->setOfferDescription($faker->text(350))
                  ->setOfferHosting($faker->word())
                  ->setTypeHosting($faker->randomElement($levels))
                  ->setDescriptionHosting($faker->text(200))
                  ->setTypeFood($faker->randomElement($levels))
                  ->setDescriptionFood($faker->text(100))
                  ->setOfferMapPhoto($faker->word())
                  ->setOfferStartPhoto('placeholder-offer-default.jpeg')
                  ->setStartPoint($faker->city())
                  ->setEndPoint($faker->city())
                  ->setRecap($faker->words(1, true))
                  ->setBrief($faker->text(25))
                  ->setCountry($country);
        }

        $manager->persist($offer);

        // Création des DatesPrix
        for ($j=0; $j < 3; $j++) {
            $datePrice = new DatesPrices();
            
            $datePrice->setPrice($faker->numberBetween(9900, 249000))
                      ->setStartDate($faker->dateTimeBetween('+1 month', '+1 year'))
                      ->setReturnDate($faker->dateTimeBetween('+1 month', '+1 year'))
                      ->setOffer($offer);

            $manager->persist($datePrice);
            }
        }
        $manager->flush();
    }
}

         