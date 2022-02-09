<?php

namespace App\DataFixtures;

use App\Entity\Author;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public const AUTHOR_VAN_HAMME ="van-hamme";

    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName('Van-Hamme');
        $author->setFirstname('Jean');
        $author->setBirthdate(new DateTime("1939-01-16"));
        $author->setDescription('Jean Van Hamme, né le 16 janvier 1939 à Bruxelles, est un romancier et scénariste belge de bande dessinée et de téléfilms. Il est surtout connu pour avoir créé et scénarisé les aventures de trois personnages de la bande dessinée belge, Thorgal (1977), XIII (1984) et Largo Winch (1990).');
        $author->setImageName("van-hamme-jean.jpg");
        $author->setUpdatedAt( new DateTimeImmutable());
        $manager->persist($author);
        $this->addReference(self::AUTHOR_VAN_HAMME, $author);

        $manager->flush();
    }
}
