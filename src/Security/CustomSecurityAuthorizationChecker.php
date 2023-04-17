<?php

namespace App\Security;

use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class CustomSecurityAuthorizationChecker implements AuthorizationCheckerInterface
{

    public function isGranted(mixed $attribute, mixed $subject = null): bool
    {
        return $attribute === 'KERNEL_OVERWRITE';
    }
}