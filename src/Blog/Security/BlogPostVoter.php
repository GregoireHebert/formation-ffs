<?php

declare(strict_types=1);

namespace App\Blog\Security;

use App\Blog\Entity\BlogPost;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class BlogPostVoter extends Voter
{
    private Security $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject)
    {
        return in_array($attribute, ['can_update_blogpost', 'can_delete_blogpost']) && $subject instanceof BlogPost;
    }

    /**
     * @param string $attribute
     * @param BlogPost $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        return $subject->author === $token->getUserIdentifier() || $this->security->isGranted('ROLE_ADMIN');
    }
}
