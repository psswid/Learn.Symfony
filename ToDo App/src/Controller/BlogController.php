<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;


class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function blogList($page=1){

        return $this->render('blog/blog.html.twig', array(
            'pageNr'=>$page,
        ));
    }

    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show($slug){
        $url = $this->generateUrl(
            'blog_show',
            array('slug'=>'my-blog-post')
        );

        return $this->render('blog/bslug.html.twig', array(
            'slug'=>$slug,
        ));
    }


}
