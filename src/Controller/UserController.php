<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    
    #[Route('/profile', name: 'profile')]
    public function index(Request $request,UserPasswordHasherInterface $userPasswordHasher,EntityManagerInterface $entityManager): Response
    {
        // On recupére le user actif dans une variable user
        // Avec la methode getUser
        $user = $this->getUser();
        //On créer un formulaire dédié a ce que peut changer l'utilisateur
        $form = $this->createForm(UserType::class, $user);
        // On Hydrate (mettre des donnée dedans) le formulaire avec les donnée POST se trouvant potentiellement dans la requête 
        $form->handleRequest($request);
        // Si il y a eu hydratation alors on verifie si le formulaire et soumis et validé
        //Alors on traite les données et on flush (on met a jour la BDD)
        if( $form->isSubmitted() && $form->isValid())
        {
            // On met a jour le mots de passe encodé de l'user s'il en a saisi un nouveau
            $plainPassword = $form->get('plainPassword')->getData();
            if(!is_null($plainPassword))
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                        $user,
                        $plainPassword
                    )
                );
    
                $entityManager->persist($user);
                $entityManager->flush();
                // On a joute un message de confirmation
                $this->addFlash("success", "Vos informations on bien été mises a jour");
                // On redirige vers la même page 
                $this->redirectToRoute('profile');
        }


        // Rendu 
        return $this->render('user/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/user/addbook', name: 'addbook', methods:["POST", "GET"])]
    public function addbook(Request $request, BookRepository $bookRepository, EntityManagerInterface $entityManagerInterface):Response
    {
        //On ajoute le bouquin a la liste de l'utilisateur 
        $book = $bookRepository->find( $request->request->get('id'));
        $user = $this->getUser();
        $user->addBook($book);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        //
        return new Response("Ok");
    }

    #[Route('/user/removebook{id}', name: 'remove-book')]

    public function removeBook(int $id, BookRepository $bookRepository, EntityManagerInterface $entityManagerInterface):Response
    {
        $book = $bookRepository->find($id);
        $user = $this->getUser();
        $user->removeBook($book);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute("profile");
    }
}
