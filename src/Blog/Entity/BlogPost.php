<?php

declare(strict_types=1);

namespace App\Blog\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class BlogPost
{
    public int $id;
    /**
     * @Assert\Length(min=10)
     * @Assert\NotBlank
     */
    public string $title;
    /**
     * @Assert\NotBlank
     */
    public string $content;

    public \DateTime $publicationDate;
    public string $author;
}
