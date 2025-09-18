<?php

namespace App\Repository;

use DateTime;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

class MongoRepository
{
    private \MongoDB\Collection $collection;


    public function __construct()
    {
        $uri = getenv('MONGO_URI');
        if (!$uri) {
            throw new \Exception("Erreur : MONGO_URI non défini");
        }

        $client = new Client($uri);
        $this->collection = $client->gameez->posts;

    }

    public function createPost(string $title, string $content, int $userId, string $username)
    {
        $result = $this->collection->insertOne([
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

        return [
            'success' => true,
            'insertedId' => (string)$result->getInsertedId()
        ];
    }

        
public function addComment(string $id, string $content_comment, int $userId, string $username): array
{
    $postId = new ObjectId($id);

    $replies = [
        '_id' => $postId, 
        'author' => [
            'id' => $userId,
            'username' => $username,
            'avatar' => strtoupper(substr($username, 0, 2)),
        ],
        'content_comment' => $content_comment,
        'created_at' => (new DateTime())->format(DateTime::ATOM),
    ];

    $this->collection->updateOne(
        ['_id' => $postId],
        ['$push' => ['replies' => $replies]]
    );

    return $replies; // 👈 renvoyer le commentaire pour l'utiliser côté controller
}


    public function likePost(string $postId): int
{

    $result = $this->collection->findOneAndUpdate(
        ['_id' => new ObjectId($postId)],
        ['$inc' => ['likes' => 1]],
        ['returnDocument' => \MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
    );

    return $result['likes'] ?? 0;
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

}

