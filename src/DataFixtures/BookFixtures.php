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
        $book->setGenre('Classic');
        $book->setimage_path('https://images-na.ssl-images-amazon.com/images/I/41ZPhBLusjL._SX315_BO1,204,203,200_.jpg');
        $book->setPageCount(208);
        $book->setPlot("Generally considered to be F. Scott Fitzgerald's finest novel, The Great Gatsby is a consummate summary of the roaring twenties, and a devastating expose of the Jazz Age. Through the narration of Nick Carraway, the reader is taken into the superficially glittering world of the mansions which lined the Long Island shore in the 1920s, to encounter Nick's cousin Daisy, her brash but wealthy husband Tom Buchanan, Jay Gatsby and the mystery that surrounds him.");
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle("Sapiens: A Brief History of Humankind");
        $book2->setAuthor(' Yuval Noah Harari');
        $book2->setReleaseYear(2015);
        $book2->setGenre('Non-Fiction');
        $book2->setimage_path('https://images-na.ssl-images-amazon.com/images/I/41yu2qXhXXL._SX324_BO1,204,203,200_.jpg');
        $book2->setPageCount(498);
        $book2->setPlot('What makes us brilliant? What makes us deadly? What makes us Sapiens?

Yuval Noah Harari challenges everything we know about being human.

Earth is 4.5 billion years old. In just a fraction of that time, one species among countless others has conquered it: us.');
        $manager->persist($book2);

        $book3 = new Book();
        $book3->setTitle("Jock of the Bushveld");
        $book3->setAuthor('Sir Percy FitzPatrick ');
        $book3->setReleaseYear(1907);
        $book3->setGenre('Folktale');
        $book3->setimage_path('https://images-na.ssl-images-amazon.com/images/I/51oZ4OMW4sL._SX331_BO1,204,203,200_.jpg');
        $book3->setPageCount(475);
        $book3->setPlot("Jock of the Bushveld is a story set in the rough Bushveld of South Africa's gold mining era. Jock is the faithful dog and companion of a transport rider. Through their adventures we catch a glimpse of those heady gold rush days. Jock, the runt of the litter turns out to be a faithful companion to the end.");
        $manager->persist($book3);

        $book4 = new Book();
        $book4->setTitle("Devil's Peak: A Novel");
        $book4->setAuthor('Deon Meyer');
        $book4->setReleaseYear(2004);
        $book4->setGenre('Mystery');
        $book4->setimage_path('https://m.media-amazon.com/images/I/41lgkBRxRHL.jpg');
        $book4->setPageCount(490);
        $book4->setPlot("A young woman makes a terrible confession to a priest. An honorable man takes his own revenge for an unspeakable tragedy. An aging inspector tries to get himself sober while taking on the most difficult case of his career. From this beginning, Deon Meyer weaves a story of astonishing complexity and suspense, as Inspector Benny Griessel faces off against a dangerous vigilante who has everything on his side, including public sympathy.");
        $manager->persist($book4);

        $manager->flush();
    }
}
