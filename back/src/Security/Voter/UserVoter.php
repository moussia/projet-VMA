<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Security;


class UserVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, ['ROLE_PARENT', 'USER_ADMIN'])
            && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case 'ROLE_PARENT':
                if ($subject == $user) {
                    return true;
                }
                break;
            case 'USER_ADMIN':
                if ($this->security->isGranted(Role::ADMIN)) {
                    return true;
                }
                if ($subject == $user) {
                    return true;
                }
                break;
        }

        return false;
    }
}
