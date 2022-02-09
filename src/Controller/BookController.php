<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'book')]
    public function index(CategoryRepository $categoryRepository): Response
    {

        // On récupére toute les catégorie 
        $categories = $categoryRepository->findAll();

        // 
        return $this->render('book/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    #[Route('/tout-les-livres', name: 'book-all')]
    public function all(BookRepository $bookRepository): Response
    {

        // On récupére toute les bouquins
        $books = $bookRepository->findAll();

        // 
        return $this->render('book/all.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/livres/recherche', name: 'book-search', methods:["GET", "POST"])]
    public function search(Request $request, BookRepository $bookRepository):Response
    {
        // On recupére dans une variable de la données posté depuis le formulaire de recherche 
        //les données ce trouve dans la propriété request de la requête de naviagtion ($request)
        $s = $request->request->get('search');
        $books = $bookRepository->search($s);
        return $this->render('book/all.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/livres/asynch/', methods:["POST"])]
    public function searchAsynch(Request $request, BookRepository $bookRepository):Response{
        // On récupère dans une variable la donnée postée depuis le formulaire de recherche
        // La donnée se trouve dans la propriété request de la requête de navigation ($request)
        $s = $request->request->get("search");
        $books = $bookRepository->search($s);
        //
        return $this->render('book/_search.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/livres/detail/{id}', name:'book-detail')]
    public function detail(int $id, BookRepository $bookRepository):Response
    {
        // On fait une requête via la repository pour allez chercher les données du livre dont on veux voire le detail
        $book= $bookRepository->find($id);
        // On déclenche le rendu d'une vue (templates) en lui passant les données du livre
        return $this->render('book/detail.html.twig',[
            "book" => $book,
        ]);
    }
    
}
