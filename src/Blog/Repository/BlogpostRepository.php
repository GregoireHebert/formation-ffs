<?php

declare(strict_types=1);

namespace App\Blog\Repository;

use App\Blog\Entity\BlogPost;

class BlogpostRepository
{
    private array $blogposts;

    public function __construct()
    {
        $post1 = new BlogPost();
        $post1->id = 1;
        $post1->title = 'Bac 2022 : choix des sujets, notation, résultats...';
        $post1->content = 'Après deux années perturbées par le Covid-19, les élèves de terminale sont les premiers à passer le bac réformé dans sa version quasi normale.';
        $post1->author = 'Boris Vian';
        $post1->publicationDate = new \DateTime();

        $this->blogposts[$post1->id] = $post1;

        $post2 = new BlogPost();
        $post2->id = 2;
        $post2->title = 'Législatives 2022 : Mélenchon sera Premier ministre';
        $post2->content = 'Selon la candidate finaliste à la présidentielle, invitée de RTL mercredi 11 mai, le leader de la Nupes risque "de transformer issue des élections législatives.';
        $post2->author = 'Alba Ventura';
        $post2->publicationDate = new \DateTime();

        $this->blogposts[$post2->id] = $post2;
    }

    public function findOneById(int $id): ?BlogPost
    {
        return $this->blogposts[$id] ?? null;
    }
}
