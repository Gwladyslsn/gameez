<?php

namespace App\Repository;

use DateTime;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

var_dump(class_exists(\MongoDB\BSON\ObjectId::class));
$id = new \MongoDB\BSON\ObjectId();

class MongoRepository
{
    private \MongoDB\Collection $collection;


    public function __construct()
    {
        $uri = getenv('MONGODB_URI');
        if (!$uri) {
            throw new \Exception("Erreur : MONGODB_URI non défini");
        }

        $client = new Client($uri);
        $this->collection = $client->gameez->posts;
    }



    public function findById(string $id): ?array
    {
        return $this->collection->findOne(['_id' => $id]);
    }

    public function getAllPosts(): array
    {
        $cursor = $this->collection->find([], ['sort' => ['created_at' => -1]]);
        return $cursor->toArray();
    }

    public function createPost(string $title, string $content, int $userId, string $username): void
    {
        $this->collection->insertOne([
            'title' => $title,
            'content' => $content,
            'author' => [
                'id' => $userId,
                'username' => $username,
                'avatar' => strtoupper(substr($username, 0, 2)),
            ],
            'likes' => 0,
            'replies' => [],
            'created_at' => (new DateTime())->format(DateTime::ATOM),
        ]);
    }

    public function addComment(int $id, string $content, int $userId, string $username): void
    {
        $this->collection->updateOne(
            ['_id' => $id],
            ['$push' => [
                'comments' => [
                    'author' => [
                        'id' => $userId,
                        'username' => $username,
                        'avatar' => strtoupper(substr($username, 0, 2)),
                    ],
                    'content' => $content,
                    'created_at' => (new DateTime())->format(DateTime::ATOM),
                ],
            ]]
        );
    }

    public function likePost(string $id): void
    {
        $this->collection->updateOne(
            ['_id' => $id],
            ['$inc' => ['likes' => 1]]
        );
    }
}

