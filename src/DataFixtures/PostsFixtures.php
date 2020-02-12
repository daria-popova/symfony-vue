<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostsFixtures extends Fixture
{

    const POSTS = [
        "Post 1",
        "Post 2",
        "Post 3"
    ];

    public function load(ObjectManager $manager)
    {

        foreach (self::POSTS as $message) {
            $post = new Post();
            $post->setMessage($message);
            $manager->persist($post);
        }

        $manager->flush();
    }
}
