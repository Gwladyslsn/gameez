<?php

namespace App\Database;

use MongoDB\Client;
use MongoDB\Database;

class MongoDBConnection
{
    private static ?Database $db = null;

    public static function getConnection(): Database
{
    if (!self::$db) {
        $uri = getenv('MONGO_URI'); 
        if (!$uri) {
            throw new \Exception("MONGO_URI non défini");
        }
        $client = new Client($uri);
        self::$db = $client->selectDatabase('Gameez');
    }

    return self::$db;
}

}
