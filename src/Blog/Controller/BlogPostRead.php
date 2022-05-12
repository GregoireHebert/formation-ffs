<?php

declare(strict_types=1);

namespace App\Blog\Controller;

use App\Blog\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class BlogPostRead extends AbstractController
{
    /**
     * @Route(path="/blog/{blogpostId<\d+>}", name="blog")
     */
    public function index(int $blogpostId, BlogpostRepository $blogpostRepository, Environment $twig): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $blogPost = $blogpostRepository->findOneById($blogpostId);
        if (null === $blogPost) {
            throw new NotFoundHttpException();
        }

        if (!$this->isGranted('can_update_blogpost', $blogPost)) {
            throw new AccessDeniedHttpException();
        }

        return new Response($twig->render('blog/blogpost.html.twig', [
            'blogPost' => $blogPost
        ]));
    }
}
