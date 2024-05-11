<?php

// Include necessary files
require_once('../includes/config.php');
// require_once('../includes/database.php');
require_once('../includes/functions.php');
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $task = $_POST['task'] ?? '';

    if (empty($task)) {
        // Handle validation errors
        echo 'Task cannot be empty';
        exit;
    }
        // Sanitize input
        $task = trim($task);
        print "$task";

}else{
    echo "sdfad";
}