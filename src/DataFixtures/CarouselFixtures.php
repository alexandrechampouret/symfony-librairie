<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $carousel = new Carousel();
            $carousel->setImageName("carousel11.jpeg");
            $carousel->setUpdatedAt(new DateTimeImmutable());
            $carousel->setTitle("bienvenue");
            $carousel->setTexte("Retrouver des livres intéréssent ");
            $manager->persist($carousel);

            $carousel = new Carousel();
            $carousel->setImageName("carousel22.jpg");
            $carousel->setUpdatedAt(new DateTimeImmutable());
            $carousel->setTitle("BD, Polar, ect");
            $carousel->setTexte("Il y en a pour tout le monde");
            $manager->persist($carousel);

        $manager->flush();
    }
}
