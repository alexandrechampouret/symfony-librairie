<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Blake et mortiméres
        $book = new Book();
        $book->setTitle("la vallée des immortel");
        $book->setDescription("Inquiets pour Mortimer qui a été kidnappé par les hommes du général Xi-Li, le capitaine Blake, accompagné de l'agente nationaliste chinoise Ylang Ti, se lance à la recherche de son ami. Se servant des indices que Mortimer a eu l'intelligence de semer sur son chemin, ils remontent peu à peu la piste qui devrait les conduire jusqu'à lui. De leur côté, Mortimer et Han-Dié, archéologue nationaliste qui a trahi son gouvernement pour vendre des documents historiques au général Xi-Li, sont emmenés de force vers le repaire du seigneur de guerre. Mortimer profite...");
        $book->setImageName("blake-mortimer-tome-26-vallee-des-immortels.jpg");
        $book->setUpdatedAt(new DateTimeImmutable());
        $book->setCategory($this->getReference(CategoryFixtures::CATEGORY_BD));
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_VAN_HAMME));
        $manager->persist($book);

        //BLAKE ET MORTIMER
        $book = new Book();
        $book->setTitle("le crie du moloch");
        $book->setDescription("Dans le précédent opus scénarisé par Jean Dufaux, \"L'Onde Septimus\", la menace d\'un engin extraterrestre, baptisé Orpheus, avait été déjouée grâce au sacrifice d\'Olrik. Depuis, le \"colonel\" vit reclus dans un asile psychiatrique. Tandis que Philip Mortimer tente de ramener à la raison son vieil adversaire, il apprend qu\'il existe un autre Orpheus. À bord d\'un cargo transformé en laboratoire secret, le professeur découvre l\'étrange pilote de cette machine : un alien à forme humaine, sombre et hiératique, auquel les scientifiques ont donné le nom de \"Moloch\", la divinité biblique. ");
        $book->setImageName("blake-mortimer-tome-27-le-cri-du-moloch.jpg");
        $book->setUpdatedAt(new DateTimeImmutable());
        $book->setCategory($this->getReference(CategoryFixtures::CATEGORY_BD));
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_VAN_HAMME));
        $manager->persist($book);

        //Dernier livre
        $book = new Book();
        $book->setTitle("le dernier espadon");
        $book->setDescription("Sur une route d'Angleterre, une voiture roule en direction de l'aéroport militaire de Hasley. À son bord, le major Rupert Humbletweed, chargé d'une mission secrète pour le gouvernement britannique.
        Au Centaur Club, à Londres, le capitaine Francis Blake dîne d'un roastbeef trop cuit avec son ami, le professeur Philip Mortimer. Il lui confie une opération de la plus haute importance : se rendre au Pakistan pour modifier le code d'activation des Espadons stockés dans la base de Makran, afin de permettre leur transfert jusqu'à Scaw-Fell, en Angleterre. 
        Blake, qui vient de prendre...");
        $book->setImageName("blake-mortimer-tome-28-le-dernier-espadon-couv.jpg");
        $book->setUpdatedAt(new DateTimeImmutable());
        $book->setCategory($this->getReference(CategoryFixtures::CATEGORY_BD));
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_VAN_HAMME));
        $manager->persist($book);

        // Mise en BDD 
        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            CategoryFixtures::class
        ];
    }
}
