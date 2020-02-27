<?php

namespace App\DataFixtures;

use App\Entity\Like;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const USERS = [
        [
            'login' => 'admin',
            'password' => 'WowMuchSafeSoSecure123',
        ],
        [
            'login' => 'mrSmith',
            'password' => 'matrixhasyou',
        ],
        [
            'login' => 'trinity',
            'password' => '123',
        ],
    ];

    const POSTS = [
        [
            'text' => 'Hello world',
            'author' => 'admin',
            'likes' => ['admin', 'mrSmith', 'trinity']
        ],
        [
            'text' => 'Whoa.',
            'author' => 'mrSmith',
            'likes' => ['admin', 'trinity']
        ],
        [
            'text' => 'The matrix has you.',
            'author' => 'mrSmith',
            'likes' => []
        ],
    ];


    public function load(ObjectManager $manager)
    {
        $users = [];
        foreach (self::USERS as $userData) {
            $userEntity = new User();
            $userEntity->setLogin($userData['login']);
            $userEntity->setPlainPassword($userData['password']);
            $userEntity->setRoles(['ROLE_FOO']);
            $manager->persist($userEntity);
            $users[$userData['login']] = $userEntity;
        }

        foreach (self::POSTS as $postData) {
            $post = new Post();
            $post->setMessage($postData['text']);
            $post->setAuthor($users[$postData['author']]);
            $manager->persist($post);

            foreach ($postData['likes'] as $likeUser) {
                $like = new Like();
                $like->setPost($post);
                $like->setUser($users[$likeUser]);
                $manager->persist($like);
            }
        }
        $manager->flush();
    }
}
