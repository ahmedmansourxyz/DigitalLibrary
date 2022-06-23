<?php

namespace App\Entity;

use App\Repository\LendingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LendingsRepository::class)]
class Lendings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Account::class, inversedBy: 'lendings')]
    #[ORM\JoinColumn(nullable: false)]
    private $account_id;

    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'lendings')]
    #[ORM\JoinColumn(nullable: false)]
    private $book_id;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountIdId(): ?account
    {
        return $this->account_id;
    }

    public function setAccountIdId(?account $account_id_id): self
    {
        $this->account_id = $account_id_id;

        return $this;
    }

    public function getBookIdId(): ?book
    {
        return $this->book_id;
    }

    public function setBookIdId(?book $book_id_id): self
    {
        $this->book_id = $book_id_id;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }
}
