<?php

namespace App\Entity;

use App\Repository\FinesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinesRepository::class)]
class Fines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: account::class, inversedBy: 'fines')]
    #[ORM\JoinColumn(nullable: false)]
    private $account;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccount(): ?account
    {
        return $this->account;
    }

    public function setAccount(?account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}
