<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle("first post");
        $post->setMessage("mom premier message");
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($post);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id  title'.$post->getTitle());
    }
}
