<?php


require_once 'vendor/autoload.php'; // Assuming you have installed the MongoDB PHP library via Composer
use MongoDB\Client;


// MongoDB connection settings
$mongoHost = 'mongodb'; // The hostname of the MongoDB server (the service name in Docker Compose)
$mongoPort = 27017;  // The port on which MongoDB is running

try {
    // Connect to MongoDB
    $mongoClient = new MongoDB\Driver\Manager("mongodb://{$mongoHost}:{$mongoPort}");
    echo "Connected to MongoDB successfully!\n";
    
    // Database name
    $databaseName = 'my_database';
    $command = new MongoDB\Driver\Command(['create' => $databaseName]);

    // Execute the command
    $mongoClient->executeCommand('admin', $command);

    echo "Database '{$databaseName}' created successfully!\n";
} catch (Exception $e) {
    // If an exception occurs, print an error message with the details
    echo "Failed to connect to MongoDB: " . $e->getMessage();
}



class Database {
    // MongoDB connection string
    private $uri = "mongodb://{$mongoHost}:{$mongoPort}";
    
    // MongoDB database name
    private $db_name = "my_database";
    
    // MongoDB collection name
    private $collection_name = "tasks";
    
    // MongoDB client instance
    private $client;
    
    // MongoDB database instance
    private $db;
    
    // MongoDB collection instance
    private $collection;
    
    // Constructor to initialize the MongoDB client and select the database/collection
    public function __construct() {
        $this->client = new Client($this->uri);
        $this->db = $this->client->{$this->db_name};
        $this->collection = $this->db->{$this->collection_name};
    }
    
    // Method to insert a document into the collection
    public function insertDocument($document) {
        $insertOneResult = $this->collection->insertOne($document);
        return $insertOneResult->getInsertedId();
    }
    
    // Method to retrieve documents from the collection
    public function getDocuments($filter = []) {
        $cursor = $this->collection->find($filter);
        return $cursor->toArray();
    }
    
    // Other methods for updating/deleting documents, querying, etc. can be added here
}