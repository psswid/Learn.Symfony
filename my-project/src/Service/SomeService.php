<?php
/**
 * Created by PhpStorm.
 * User: Stef
 * Date: 18.01.2018
 * Time: 13:59
 */
namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class SomeService
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function someMethod(){
        $url = $this->router->generate(
            'blog_show',
            array('slug'=>'my-blog-post')
        );
    }
}