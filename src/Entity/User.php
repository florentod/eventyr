<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_civility;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_last_name;

    /**
     * @ORM\Column(type="date")
     */
    private $user_birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_nationality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_zipcode;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_phone;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_mobile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_passport_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_passport_country;

    /**
     * @ORM\Column(type="date")
     */
    private $user_passport_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_select_comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(){
      
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;
        
        return $this;
    }

    public function getUserCivility(): ?string
    {
        return $this->user_civility;
    }

    public function setUserCivility(string $user_civility): self
    {
        $this->user_civility = $user_civility;

        return $this;
    }

    public function getUserFirstName(): ?string
    {
        return $this->user_first_name;
    }

    public function setUserFirstName(string $user_first_name): self
    {
        $this->user_first_name = $user_first_name;

        return $this;
    }

    public function getUserLastName(): ?string
    {
        return $this->user_last_name;
    }

    public function setUserLastName(string $user_last_name): self
    {
        $this->user_last_name = $user_last_name;

        return $this;
    }

    public function getUserBirthday(): ?\DateTimeInterface
    {
        return $this->user_birthday;
    }

    public function setUserBirthday(\DateTimeInterface $user_birthday): self
    {
        $this->user_birthday = $user_birthday;

        return $this;
    }

    public function getUserNationality(): ?string
    {
        return $this->user_nationality;
    }

    public function setUserNationality(string $user_nationality): self
    {
        $this->user_nationality = $user_nationality;

        return $this;
    }

    public function getUserAddress(): ?string
    {
        return $this->user_address;
    }

    public function setUserAddress(string $user_address): self
    {
        $this->user_address = $user_address;

        return $this;
    }

    public function getUserCity(): ?string
    {
        return $this->user_city;
    }

    public function setUserCity(string $user_city): self
    {
        $this->user_city = $user_city;

        return $this;
    }

    public function getUserZipcode(): ?string
    {
        return $this->user_zipcode;
    }

    public function setUserZipcode(string $user_zipcode): self
    {
        $this->user_zipcode = $user_zipcode;

        return $this;
    }

    public function getUserPhone(): ?int
    {
        return $this->user_phone;
    }

    public function setUserPhone(int $user_phone): self
    {
        $this->user_phone = $user_phone;

        return $this;
    }

    public function getUserMobile(): ?int
    {
        return $this->user_mobile;
    }

    public function setUserMobile(int $user_mobile): self
    {
        $this->user_mobile = $user_mobile;

        return $this;
    }

    public function getUserPassportNumber(): ?string
    {
        return $this->user_passport_number;
    }

    public function setUserPassportNumber(string $user_passport_number): self
    {
        $this->user_passport_number = $user_passport_number;

        return $this;
    }

    public function getUserPassportCountry(): ?string
    {
        return $this->user_passport_country;
    }

    public function setUserPassportCountry(string $user_passport_country): self
    {
        $this->user_passport_country = $user_passport_country;

        return $this;
    }

    public function getUserPassportDate(): ?\DateTimeInterface
    {
        return $this->user_passport_date;
    }

    public function setUserPassportDate(\DateTimeInterface $user_passport_date): self
    {
        $this->user_passport_date = $user_passport_date;

        return $this;
    }

    public function getUserPhoto(): ?string
    {
        return $this->user_photo;
    }

    public function setUserPhoto(string $user_photo): self
    {
        $this->user_photo = $user_photo;

        return $this;
    }

    public function getUserSelectComment(): ?string
    {
        return $this->user_select_comment;
    }

    public function setUserSelectComment(string $user_select_comment): self
    {
        $this->user_select_comment = $user_select_comment;

        return $this;
    }
}
