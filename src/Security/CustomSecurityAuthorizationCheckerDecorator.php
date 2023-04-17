<?php

namespace App\Security;

use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

#[AsDecorator(decorates: 'security.authorization_checker')]
class CustomSecurityAuthorizationCheckerDecorator implements AuthorizationCheckerInterface
{

    public function __construct(
        private readonly AuthorizationCheckerInterface $inner
    ){
    }

    public function isGranted(mixed $attribute, mixed $subject = null): bool
    {
        return $attribute === 'DECORATOR_OVERWRITE' || $this->inner->isGranted($attribute, $subject);
    }
}