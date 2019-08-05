<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Service\MarkdownHelper;
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


    public function show($slug, MarkdownHelper $markdownHelper)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
       // dump($slug,$this);

        $articleContent = <<<EOF

        Bacon ipsum dolor amet filet mignon picanha kielbasa jowl hamburger shankle biltong chicken 
        turkey pastrami cupim pork chop. Chicken andouille prosciutto capicola picanha, brisket t-bone. 
        Tri-tip pig pork chop short ribs frankfurter pork ham. Landjaeger meatball meatloaf, kielbasa strip
        steak leberkas picanha swine chicken pancetta pork loin hamburger pork.
    
        Kielbasa pork belly meatball cupim burgdoggen chuck turkey buffalo ground round leberkas cow shank
        short loin bacon alcatra. Leberkas short loin boudin swine, ham hock bresaola turducken tail 
        pastrami picanha pancetta andouille rump landjaeger bacon. Pastrami swine rump meatball filet
        mignon turkey alcatra. Picanha filet mignon ground round tongue ham hock ball tip tri-tip, 
        prosciutto leberkas kielbasa short loin short ribs drumstick. Flank pig kielbasa short loin jerky 
        ham hock turducken prosciutto t-bone salami pork jowl.
     
        Pastrami short loin pork chop, chicken kielbasa swine turducken jerky short ribs beef. Short 
        ribs alcatra shoulder, flank pork chop shankle t-bone. Tail rump pork chop boudin pig, chicken 
        porchetta. Shank doner biltong, capicola brisket sausage meatloaf beef ribs kevin beef rump ribeye
        t-bone. Shoulder cupim meatloaf, beef kevin frankfurter picanha bacon. Frankfurter bresaola chuck 
        kevin buffalo strip steak pork loin beef ribs prosciutto picanha shankle. Drumstick prosciutto 
        pancetta beef ribs.
EOF;

        $articleContent = $markdownHelper->parse($articleContent);

        // dump($markdown);die;

        return $this->render('article/show.html.twig', [
            'title' => ucwords($slug),
            'comments' => $comments,
            'articleContent' => $articleContent,
        ]);
    }

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart the article!
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}