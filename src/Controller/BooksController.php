<?php

namespace App\Controller;

use Amp\Http\Client\Request;
use App\Repository\Account;
use App\Repository\AccountRepository;
use App\Repository\BookRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lendings;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

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

    public function searchBar(){
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class)
            ->add('search', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ->getForm();

        return $this->render('books/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }







    /**
     * @Route("/books/searchResult.html.twig", name="handleSearch")
     * @param Request $request
     */
    #[Route('handleSearch', methods: ['POST'], name: 'handleSearch')]
    public function handleSearch (Request $request){
        var_dump($request->request);
        die();
    }

}
