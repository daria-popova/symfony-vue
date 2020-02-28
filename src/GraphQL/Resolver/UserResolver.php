<?php

namespace App\GraphQL\Resolver;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class UserResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'User'
        ];
    }

    public function resolve(Argument $args)
    {
        return $this->em->getRepository(User::class)->find($args['id']);
    }
}
