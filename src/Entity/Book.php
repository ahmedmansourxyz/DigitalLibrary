<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $genre;

    #[ORM\Column(type: 'string', length: 255)]
    private $author;

    #[ORM\Column(type: 'integer')]
    private $releaseYear;

    #[ORM\Column(type: 'string', length: 500)]
    private $plot;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pageCount;

    #[ORM\Column(type: 'string', nullable: true)]
    private $image_path;

    #[ORM\OneToMany(mappedBy: 'book_id', targetEntity: Lendings::class, orphanRemoval: true)]
    private $lendings;

    public function __construct()
    {
        $this->lendings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getimage_path(): ?string
    {
        return $this->image_path;
    }

    public function setimage_path(string $image_path): self
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }


    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): self
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getPlot(): ?string
    {
        return $this->plot;
    }

    public function setPlot(string $plot): self
    {
        $this->plot = $plot;

        return $this;
    }

    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    public function setPageCount(?int $pageCount): self
    {
        $this->pageCount = $pageCount;

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
            $lending->setBookId($this);
        }

        return $this;
    }

    public function removeLending(Lendings $lending): self
    {
        if ($this->lendings->removeElement($lending)) {
            // set the owning side to null (unless already changed)
            if ($lending->getBookId() === $this) {
                $lending->setBookId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }

}

