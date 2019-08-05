<?php
namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class ArticleAdminController extends AbstractController
{
	 public function new(EntityManagerInterface $em)
    {
    	 $article = new Article();
    	 $article->setTitle('Why Asteroids Taste Like Bacon');
    	 $article->setSlug('politics'.rand(100, 999));
    	 $article->setContent(<<<EOF

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
EOF
        );

    	 if (rand(1, 10) > 2) {
            $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
        }

        $em->persist($article);
        $em->flush();

    	 return new Response(sprintf(
            'add new artical',
            $article->getId()
        ));
    }
}