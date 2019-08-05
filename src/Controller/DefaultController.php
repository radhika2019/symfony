<?php

namespace App\Controller;

use App\Entity\Article;
use Psr\Log\LoggerInterface;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    public function index()
    {
        return new Response('OMG! My first page already! WOOO!');
    }


    public function show($slug, MarkdownHelper $markdownHelper,EntityManagerInterface $em)
    {

         $repository = $em->getRepository(Article::class);
         $article = $repository->findOneBy(['slug' => $slug]);
        if (!$article) {
            throw $this->createNotFoundException(sprintf('No article for slug "%s"', $slug));
        }
        
        // dump($article);die;

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

       // $articleContent = $markdownHelper->parse($articleContent);

        // dump($markdown);die;

        return $this->render('article/show.html.twig', [
            'comments' => $comments,
            'article' => $article,
        ]);
    }

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart the article!
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}