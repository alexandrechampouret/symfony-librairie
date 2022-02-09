<?php

namespace App\DataFixtures;

use App\Entity\Category;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    // -----------PROPRIETÉ------------
    public const CATEGORY_BD = "categorie-bd";
    public const CATEGORY_POLAR = "categorie-polar";


    // -----------METHODE -------------
    public function load(ObjectManager $manager): void
    {
        // Bande déssiné
        $cat = new Category();
        $cat->setTitle('Bande dessinée');
        $cat->setDescription("Une bande dessinée (dénomination communément abrégée en BD ou en bédé) est une forme d'expression artistique, souvent désignée comme le « neuvième art », utilisant une juxtaposition de dessins (ou d'autres types d'images fixes, mais pas uniquement photographiques), articulés en séquences narratives et le plus souvent accompagnés de textes (narrations, dialogues, onomatopées). Will Eisner, un des plus grands auteurs américains de bande dessinée, l'a définie (avant l'émergence d'Internet) comme « la principale application de l'art séquentiel au support papier »");
        $cat->setSlug("db");
        $cat->setUpdatedAt( new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_BD, $cat);

        // Romant policier
        $cat = new Category();
        $cat->setTitle('Roman policier ');
        $cat->setDescription("Le roman policier (familièrement appelé « polar » en France) est un roman relevant du genre policier. Le drame y est fondé sur l'attention d'un fait ou, plus précisément, d'une intrigue, et sur une recherche méthodique faite de preuves, le plus souvent par une enquête policière ou encore une enquête de détective privé. L'abréviation « policier1 » (pour « roman policier ») est également utilisée. Le genre policier comporte six invariants : le crime ou délit, le mobile, le coupable, la victime, le mode opératoire et l'enquête. Le roman policier recouvre beaucoup de types de romans, notamment le roman noir et le roman à suspense ou thriller. Si l'action est transposée au minimum d'un siècle en arrière, on pourra le qualifier raisonnablement de roman policier historique. Il existe également des romans policiers de science-fiction");
        $cat->setSlug("polar");
        $cat->setUpdatedAt( new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_POLAR, $cat);

        // Mise en BDD
        $manager->flush();
    }
}
