<?php

namespace App\Controller;
use App\Entity\Account;
use App\Repository\AccountRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\LendingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProfileController extends AbstractController
{
    private  $accountRepository;
    private $lendRepository;
    public function __construct(AccountRepository $accountRepository, LendingsRepository $lendRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->lendRepository = $lendRepository;
    }

    #[Route('/profile', methods: ['GET'], name: 'app_profile')]
    public function index(Request $request, LendingsRepository $lendRepository): Response
    {
        $lends = $this->lendRepository->findAll();

        $email = $request->getSession()->get('_security.last_username');
        
        $account = $this->accountRepository->findOneByEmail($email);

        return $this->render('profile/index.html.twig', [
            'account' => $account,
            'lends' => $lends
        ]);
    }




    // That's for changing password section. Will be fix when the front is ready //



    
//     #[Route('/profile/changePassword', name: 'app_profile')]
//   {
//        $email = $request->getSession()->get('_security.last_username');
//        $user = $this->accountRepository->findOneByEmail($email);
        
//       $form = $this->createForm(RegistrationFormType::class, $user);
//       $form->handleRequest($request);
         
//       if($userPasswordHasher->isPasswordValid($user,$form->get('oldPassword')->getData()))
//       {
//        if(!$userPasswordHasher->isPasswordValid($user,$form->get('newPassword')->getData()))
//        {
//          if($form->get('newPassword')->getData()==$form->get('plainPassword')->getData())
//        {
//            $user->setPassword(
//                    $userPasswordHasher->hashPassword(
//                        $user,
//                        $form->get('newPassword')->getData()
//                    )
//                );
//                $entityManager->persist($user);
//                $entityManager->flush();
//            }
//            else{echo 'Passwords do not match';}
//        }
//        else{echo 'Your new password can not be same with the new one';}
//     }
//    else{echo 'That is not current password';}
// }
}