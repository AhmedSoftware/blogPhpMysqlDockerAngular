<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializationContext;

/**
 * @Route("/post")
 */
class PostController extends Controller
{


    /**
     * @Method({"GET"})
     * @Route("/", name="post_index")
     */
    public function index(PostRepository $postRepository): Response
    {
        $data = $this->get('jms_serializer')->serialize($postRepository->findAll(),'json',SerializationContext::create()->setGroups(array("list")));
        $response = new Response($data,Response::HTTP_OK);
        $response->headers->set('Content-Type','application/json');

        return $response;

    }

    /**
     * @Method({"POST"})
     * @Route("/new", name="post_new")
     */
    public function new(Request $request): Response
    {
       $data = $request->getContent();
       $post = $this->get('jms_serializer')->deserialize($data,'App\Entity\Post','json');
       $em=$this->getDoctrine()->getManager();
       $em ->persist($post);
       $em->flush();

       return new Response('',Response::HTTP_CREATED);

    }

    /**
     * @Method({"GET"})
     * @Route("/{id}", name="post_show")
     */
    public function show(Post $post): Response
    {
        $data = $this->get('jms_serializer')->serialize($post,'json',SerializationContext::create()->setGroups(array('detail')));
        $response  = new Response($data,Response::HTTP_OK);
        $response->headers->set('Content-Type','application/json');
        return  $response;
    }

    /**
     * @Method({"PUT"})
     * @Route("/{id}", name="post_edit")
     */
    public function edit(Request $request, Post $post): Response
    {
       return new Response('edit');
    }

    /**
     * @Method({"DELETE"})
     * @Route("/{id}", name="post_delete")
     */
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return new Response('delete');
    }
}
