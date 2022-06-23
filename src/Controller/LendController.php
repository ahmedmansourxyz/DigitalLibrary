<?php

namespace App\Controller;

use App\Form\LendFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Account;
use Symfony\Component\Security\Core\Security;
use App\Repository\AccountRepository;
use App\Repository\BookRepository;
use App\Repository\LendingsRepository;
use App\Entity\Lendings;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Request;


class LendController extends AbstractController
{
    private $em;
    private $lendingRepository;
    private $accountRepository;
    private $bookRepository;
    private $security;
    public function __construct(Security $security, AccountRepository $accountRepository, LendingsRepository $lendingRepository, EntityManagerInterface $em) //BookRepository $bookRepository)
    {
        $this->security = $security;
        //$this->bookRepository = $bookRepository;
        $this->lendingRepository = $lendingRepository;
        $this->accountRepository = $accountRepository;
        $this->em = $em;
    }

    #[Route('/lend/{id}', methods: ['GET'], name: 'app_lend')]
    public function index(Request $request, $id): Response
    {
        $user = $this->security->getUser();

        $lend = new Lendings();
        $form = $this->createForm(LendFormType::class, $lend);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $newLend = $form->getData();
            $start = new \DateTime();
            $newLend->setStartDate($start);
            $end = $form->get('end_date');
            $newLend->setAccountIdId($user);
            $book = $this->em->getRepository(Book::class)->find($id);
            $newLend->setBookIdId($book);
            $this->em->persist($newLend);
            $this->em->flush();

            return $this->redirectToRoute('app_profile');
        }



        return $this->render('lend/index.html.twig',[
            'form' => $form->createView()
        ]);
    }


}
