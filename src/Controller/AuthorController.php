<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        $authors = $authorRepository->findAll();
        return $this->render('author/index.html.twig', [
            'authors' => $authors,
        ]);
    }
    #[Route('/author/detail/{id}', name: 'author-detail')]

    public function detail(int $id, AuthorRepository $authorRepository):Response
    {
        $author = $authorRepository->find($id);
        return $this->render('author/detail.html.twig', [
            'author' => $author
        ]);
    }
}
