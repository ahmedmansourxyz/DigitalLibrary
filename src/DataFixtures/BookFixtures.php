<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle("The Great Gatsby");
        $book->setAuthor('F. Scott Fitzgerald');
        $book->setReleaseYear(1925);
        $book->setimagePath('https://images-na.ssl-images-amazon.com/images/I/41ZPhBLusjL._SX315_BO1,204,203,200_.jpg');
        $book->setPageCount(208);
        $book->setPlot("Generally considered to be F. Scott Fitzgerald's finest novel, The Great Gatsby is a consummate summary of the roaring twenties, and a devastating expose of the Jazz Age. Through the narration of Nick Carraway, the reader is taken into the superficially glittering world of the mansions which lined the Long Island shore in the 1920s, to encounter Nick's cousin Daisy, her brash but wealthy husband Tom Buchanan, Jay Gatsby and the mystery that surrounds him.");
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle("Sapiens: A Brief History of Humankind");
        $book2->setAuthor(' Yuval Noah Harari');
        $book2->setReleaseYear(2015);
        $book2->setimagePath('https://images-na.ssl-images-amazon.com/images/I/41yu2qXhXXL._SX324_BO1,204,203,200_.jpg');
        $book2->setPageCount(498);
        $book2->setPlot('What makes us brilliant? What makes us deadly? What makes us Sapiens?

Yuval Noah Harari challenges everything we know about being human.

Earth is 4.5 billion years old. In just a fraction of that time, one species among countless others has conquered it: us.');
        $manager->persist($book2);

        $manager->flush();
    }
}
