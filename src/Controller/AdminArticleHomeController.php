<?php

namespace App\Controller;

use App\Entity\ArticleHome;
use App\Form\ArticleHomeType;
use App\Repository\ArticleHomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/article/home')]
class AdminArticleHomeController extends AbstractController
{
    #[Route('/', name: 'admin_article_home_index', methods: ['GET'])]
    public function index(ArticleHomeRepository $articleHomeRepository): Response
    {
        return $this->render('admin_article_home/index.html.twig', [
            'article_homes' => $articleHomeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_article_home_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $articleHome = new ArticleHome();
        $form = $this->createForm(ArticleHomeType::class, $articleHome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articleHome);
            $entityManager->flush();

            return $this->redirectToRoute('admin_article_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_article_home/new.html.twig', [
            'article_home' => $articleHome,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_article_home_show', methods: ['GET'])]
    public function show(ArticleHome $articleHome): Response
    {
        return $this->render('admin_article_home/show.html.twig', [
            'article_home' => $articleHome,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_article_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ArticleHome $articleHome, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticleHomeType::class, $articleHome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_article_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_article_home/edit.html.twig', [
            'article_home' => $articleHome,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_article_home_delete', methods: ['POST'])]
    public function delete(Request $request, ArticleHome $articleHome, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleHome->getId(), $request->request->get('_token'))) {
            $entityManager->remove($articleHome);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_article_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
