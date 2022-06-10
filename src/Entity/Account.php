<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: AccountRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Account implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $name;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $surname;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(mappedBy: 'account_id', targetEntity: Lendings::class, orphanRemoval: true)]
    private $lendings;

    #[ORM\OneToMany(mappedBy: 'account', targetEntity: Fines::class, orphanRemoval: true)]
    private $fines;

    public function __construct()
    {
        $this->lendings = new ArrayCollection();
        $this->fines = new ArrayCollection();
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function __toString(){
        return $this->name;
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
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, Lendings>
     */
    public function getLendings(): Collection
    {
        return $this->lendings;
    }

    public function addLending(Lendings $lending): self
    {
        if (!$this->lendings->contains($lending)) {
            $this->lendings[] = $lending;
            $lending->setAccountId($this);
        }

        return $this;
    }

    public function removeLending(Lendings $lending): self
    {
        if ($this->lendings->removeElement($lending)) {
            // set the owning side to null (unless already changed)
            if ($lending->getAccountId() === $this) {
                $lending->setAccountId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fines>
     */
    public function getFines(): Collection
    {
        return $this->fines;
    }

    public function addFine(Fines $fine): self
    {
        if (!$this->fines->contains($fine)) {
            $this->fines[] = $fine;
            $fine->setAccount($this);
        }

        return $this;
    }

    public function removeFine(Fines $fine): self
    {
        if ($this->fines->removeElement($fine)) {
            // set the owning side to null (unless already changed)
            if ($fine->getAccount() === $this) {
                $fine->setAccount(null);
            }
        }

        return $this;
    }
}
