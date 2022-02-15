<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ApiResource(
 *     normalizationContext={"groups"={"user_read"}},
 *     denormalizationContext={"groups"={"user_write"}},
 *     collectionOperations={
 *         "post",
 *         "get"={"security"="is_granted('ROLE_USER')"},
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"security_post_denormalize"="is_granted('ROLE_USER', user)"},
 *         "patch"={"security_post_denormalize"="is_granted('ROLE_USER', user)"},
 *         "delete"={"security_post_denormalize"="is_granted('ROLE_ADMIN', user)"},
 *     }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("user_read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * 
     * @Assert\NotNull
     * @Assert\Email
     * @Groups({"user_read", "user_write"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * 
     * @Groups("user_read")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * 
     * @Groups("user_write")
     * @Assert\Length(
     *     min = 3,
     *     max = 20)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $photo;

    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_read", "user_write"})
     */
    private $zipcode;

    /**
     * @var string
     * 
     * @Groups("user_write")
     * @SerializedName("password")
     */
    private $plainPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
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
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
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
        $this->plainPassword = null;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }
}
