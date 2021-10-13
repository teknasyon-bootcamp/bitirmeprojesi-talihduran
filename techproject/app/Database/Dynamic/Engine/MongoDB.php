<?php

namespace App\Database\Dynamic\Engine;

use Exception;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;

class MongoDB implements DriverInterface
{
    protected Client $client;
    protected string $dbname;


    public function __construct(string $protocol, string $host, string $user, string $pass, string $dbname, ?array $options)
    {
        try{
            //$this->client = new \MongoDB\Client("mongodb://$user:$pass@$host:$protocol/$dbname");//Düzenlenecek;
            $this->client = new Client("mongodb://127.0.0.1/");
            $this->dbname = $dbname;
        }catch (\MongoException $exception){
            echo $exception->getMessage();
        }
    }

    public function all(string $table): array
    {
        $db= $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        return $collection->find()->toArray();
    }

    public function find(string $table, mixed $id): mixed
    {
        $db= $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        return $collection->findOne(['_id' =>new ObjectId($id)]);
    }

    public function create(string $table, array $values): bool 
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $insertManyResult = $collection->insertMany($values);
        return  $insertManyResult->isAcknowledged();
    }

    public function update(string $table, mixed $id, array $values): bool
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $updateResult = $collection->updateMany(
            ['_id' => new ObjectId($id)],
            ['$set'=>$values]
        );

        return $updateResult->isAcknowledged();
    }

    public function delete(string $table, mixed $id): bool
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $deleteResult = $collection->deleteMany(
            ['_id' => new ObjectId($id)]
        );

        return $deleteResult->isAcknowledged();
    }
}
