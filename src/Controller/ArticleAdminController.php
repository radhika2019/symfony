<?php
namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class ArticleAdminController extends AbstractController
{
	 public function new(EntityManagerInterface $em) {    	
        $article = new Article();
        
        $form = $this->createForm(ArticleFormType::class, $article);
       // dump($form);
        //die;
        return $this->render('article/add.html.twig', [
            'testdata' => 'hellooo',
            'ArticleForm' => $form->createView()
        ]);
    }


    public function list(EntityManagerInterface $em){
            $article = $em->getRepository(Article::class)->findAll();;
           return $this->render('article/list.html.twig', [
            'articles' => $article
        ]);  
    }
}