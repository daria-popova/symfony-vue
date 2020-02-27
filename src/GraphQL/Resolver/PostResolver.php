<?php

namespace App\GraphQL\Resolver;

use App\Entity\Post;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


class PostResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Post'
        ];
    }

    public function resolve(Argument $args)
    {
        $post = $this->em->getRepository(Post::class)->find($args['id']);
        return $post;
    }
}