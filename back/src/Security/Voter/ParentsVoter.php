<?php

namespace App\Security\Voter;

use App\Entity\Parents;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ParentsVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, ['PARENTS_GET'])
            && $subject instanceof Parents;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case 'PARENTS_GET':
                return $subject->getId() < 10;
                break;
        }

        return false;
    }
}
