<?php

namespace App\DataFixtures;

use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $account = new Account();
        $account->setName('DigiLib');
        $account->setSurname("Admin");
        $account->setEmail('digilib.auth@gmail.com');
        $account->setPassword('SoftwareStudio1');
        $account->setRoles(['ROLE_ADMIN']);
        $account->setIsVerified(1);
        $manager->persist($account);

        $manager->flush();
    }
}
