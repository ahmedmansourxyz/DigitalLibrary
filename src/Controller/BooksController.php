<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    private $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    #[Route('/', methods: ['GET'], name: 'app_books')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $this->bookRepository->findAll();

        return $this->render('books/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('/books/{id}', methods: ['GET'], name: 'show_books')]
    public function show($id): Response
    {
        $book = $this->bookRepository->find($id);

        return $this->render('books/bookInfo.html.twig', [
            'book' => $book
        ]);
    }
}
