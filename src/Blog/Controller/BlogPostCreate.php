<?php

declare(strict_types=1);

namespace App\Blog\Controller;

use App\Blog\Entity\BlogPost;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BlogPostCreate
{
    /**
     * @Route("/blogpost", name="blogpost_create")
     */
    public function create(ValidatorInterface $validator): Response
    {
        $blogPost = new BlogPost();
        $blogPost->title = 'e';

        $violationList = $validator->validate($blogPost);
        dump($violationList);

        return new Response('<body>ma page</body>');
    }
}
