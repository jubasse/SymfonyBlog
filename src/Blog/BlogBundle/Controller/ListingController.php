<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListingController extends Controller
{

    /**
     * @return \Blog\BlogBundle\Repository\PostRepository
     */
    public function getPostRepo()
    {
        return $this->getDoctrine()->getManager()->getRepository('BlogBundle:Post');
    }

    /**
     * @Route("/",name="listLastPosts")
     */
    public function indexAction()
    {
        $posts = $this->getPostRepo()->getThreeLast();
        $invert = 'premiers';
        $pathName = 'listFirstPosts';
        return $this->render('BlogBundle:Default:index.html.twig',compact('posts','invert','pathName'));
    }

    /**
     * @Route("/posts/first",name="listFirstPosts")
     */
    public function lastAction()
    {
        $posts = $this->getPostRepo()->getThreeFirst();
        $invert = 'derniers';
        $pathName = 'listLastPosts';
        return $this->render('BlogBundle:Default:index.html.twig',compact('posts','invert','pathName'));
    }
}
