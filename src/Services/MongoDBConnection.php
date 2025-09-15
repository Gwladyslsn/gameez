<?php
require 'vendor/autoload.php'; // Composer autoload

use MongoDB\Client;

class MongoDBConnection {
    private static $client = null;

    public static function getConnection(): \MongoDB\Database {
        if (self::$client === null) {
            self::$client = new Client("mongodb://localhost:27017"); // change si Atlas
        }
        return self::$client->gameez; // nom de la base
    }
}
