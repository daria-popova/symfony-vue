<?php

namespace App\GraphQL\Resolver;

use App\Entity\Post;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


class PostsResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Posts'
        ];
    }

    public function resolve(Argument $args)
    {
        return $this->em->getRepository(Post::class)->findAll();;
    }
}