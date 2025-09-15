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
            // ⚠️ Mets ici ton URI MongoDB (local/Docker ou Atlas)
            // Exemple Docker :
            $client = new Client('mongodb://mongo:27017');

            // Exemple Atlas :
            // $client = new Client('mongodb+srv://<user>:<pass>@<cluster>.mongodb.net');

            self::$db = $client->selectDatabase('gameez'); // le nom de ta DB
        }

        return self::$db;
    }
}
