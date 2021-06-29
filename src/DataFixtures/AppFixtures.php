<?php

namespace App\DataFixtures;

use App\Entity\Countries;
use App\Entity\DatesPrices;
use App\Entity\Offers;
use App\Entity\Steps;
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
                  ->setDescriptionFood("Vous aurez le choix de prendre vos repas :
                  <br><br>
                  Eichardts Bar – Bar à tapas servant des spécialités de la cuisine locale. Sert le déjeuner et le dîner
                  tous les jours.
                  <br><br>
                  The Grille – Restaurant un bar servant des spécialités de la cuisine locale. Ouvert tous les jours.
              ")
                  ->setOfferMapPhoto($faker->word())
                  ->setOfferStartPhoto('placeholder-offer-default.jpeg')
                  ->setStartPoint($faker->city())
                  ->setEndPoint($faker->city())
                  ->setRecap("Sports extrêmes dans la région de Queenstown,
                Nouvelle-Zélande")
                  ->setBrief('Située dans la région d’Otago, sur l’Île du Sud, la ville de Queenstown est très certainement la capitale mondiale des sports extrêmes. Une quantité incroyable d’activités au haut taux de sensations fortes s’offrent effectivement à vous dans cette ville.')
                  ->setCountry($country);
        
            } else {

            $offerTypes = ['extreme', 'decouverte', 'inattendu'];
            $offerLevels = ['facile', 'moyen', 'dificile'];
            $offerHostings = ['hôtel', 'camping'];
            $offerFoods = ['pension complète'];

            $offer->setOfferName($faker->words(3, true))
   
                  ->setOfferType($faker->randomElement($offerTypes))
                  ->setOfferDifficulty($faker->randomElement($offerLevels))
                  ->setOfferDescription($faker->text(350))
                  ->setOfferHosting($faker->word())
                  ->setTypeHosting($faker->randomElement($offerHostings))
                  ->setDescriptionHosting($faker->text(200))
                  ->setTypeFood($faker->randomElement($offerFoods))
                  ->setDescriptionFood($faker->text(100))
                  ->setOfferMapPhoto($faker->word())
                  ->setOfferStartPhoto('placeholder-offer-default.jpeg')
                  ->setStartPoint($faker->city())
                  ->setEndPoint($faker->city())
                  ->setRecap($faker->text(100))
                  ->setBrief($faker->text(25))
                  ->setCountry($country);
        }

        $manager->persist($offer);

        //Création des étapes
        $stepNames = ["VOL POUR QUEENSTOWN", "QUEENSTOWN", "QUEENSTOWN", "KAWARAU BUNGY", "MOUNT ASPIRING NATIONAL PARK", "QUEENSTOWN", "CORONET CARDRONA COMBO", "QUEENSTOWN", "QUEENSTOWN", "VOL POUR PARIS"];

        $stepsDescription = ["", "Transfert privé et installation pour huit nuits sur les rives du sublime lac Wakatipu, dans une adresse emblématique du centre-ville. Une ancienne demeure du XIXe siècle reconvertie en hôtellerie chic : le design intérieur signé Virgina Fisher est racé, raffiné et légèrement décalé entre pièces antiques et objets modernes. Un nouveau bâtiment contemporain est accolé à la maison historique et le contraste rendu est des plus pointus. Les chambres sont spacieuses et chaleureuses, chacune agrémentée d'une cheminée et de vues sur le lac ou les montagnes qui ceinturent Queenstown.", "La région compile les merveilles naturelles ; il s’y pratique aussi une agriculture qui se traduit par de bien belles choses - les vins de Central Otago, pour ne citer qu’eux, que l’on peut dénicher dans les boutiques ou dans les fermes-mêmes. Il s’y est ajouté récemment une nouvelle dimension : en tournant ici son adaptation du Seigneur des Anneaux de J.R.R. Tolkien, Peter Jackson en a fait la Terre du Milieu. Queenstown, quant à elle, incarne la capitale néo-zélandaise des activités outdoor, été comme hiver. Un tour sur le lac Wakatipu, à bord du TSS Earnslaw, vapeur de 1912, est un délicieux moment de nostalgie voyageuse.", "Au programme : direction le Kawarau Bungy à 30 mn de Queenstown pour effectuer votre première expérience extrème avec un saut à l’élastique à 134 mètres, et une tyrolienne d’une hauteur de 30 étages qui propulse ses visiteurs à une vitesse de 70 km/h. Retour à l’hôtel en fin d’après-midi", "Au programme : direction The braided Dart River qui s'enfonce dans le parc national du Mont Aspiring, serpentant à travers les lieux de tournage du Seigneur des Anneaux. Une aventure en jet boat est une combinaison unique de paysages spectaculaires, de patrimoine maori et d'adrénaline. Retour à l’hôtel en fin d’après-midi.", "Au programme : avec 60 mètres de chute libre, le Canyon Swing est le saut de falaise le plus haut du monde. C'est une expérience unique. C'est un saut sans égal. Retour à l’hôtel en fin de matinée. Nous vous laissons votre après-midi pour vous reposer.", "Au programme : le top du top avec 2 vols et 2 bike parks épiques. Envolez-vous en hélicoptère d'abord vers Cardrona pour une demi-journée de bon tour à vélo, suivi d'un deuxième vol jusqu'au sommet de Coronet pour une autre session de tours ou d'action en descente ! Retour à l’hôtel en fin d’après-midi.", "Au programme : descente d’une colline à l’intérieur d’une sphère coussinée (zorbing), l'occasion idéale de laisser l'enfant qui sommeille en vous s'amuser. Puis direction le saut en parachute à bord d'un petit avion et sautez en parachute en tandem avec un guide expérimenté. En chute libre pendant une minute à la vitesse limite, vous pourrez atteindre des vitesses allant jusqu'à 124 m/h (200 km/h), puis détendez-vous en admirant les vues sur le lac Wakatipu et la chaîne de montagnes Remarkables. Retour à l’hôtel en fin d’après-midi.", "Au programme : Une croisière dans le fjord de Milford Sound. On y va en avion à partir de Queenstown ; on en revient de la même façon. Le survol des montagnes et des glaciers du parc national Fjordland - inscrit au patrimoine mondial de l’UNESCO - est à couper le souffle. Et la navigation dans le fjord, dont les parois abruptes peuvent s’élever à plus de mille mètres au-dessus de l’eau, offre l’expérience d’une certaine majesté géologique. Deux chutes spectaculaires permanentes : Lady Bowen Falls et Stirling Falls. Des grands dauphins viennent jouer le long de la coque ; on aperçoit des phoques, des gorfous et, parfois, des baleines à bosse ou des baleines franches australes.", ""];

        for ($k=0; $k < 10; $k++) {
            $step = new Steps();

            if ($i == 0) {
                $step->setStepName($stepNames[$k])
                    ->setStepOrder($k)
                    ->setStepDescription($stepsDescription[$k])
                    ->setOffers($offer);
            } else {
                $step->setStepName($faker->text(15))
                    ->setStepOrder($k)
                    ->setStepDescription($faker->text(25))
                    ->setOffers($offer);
            }
            $manager->persist($step);
        }

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

         