<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', 'root');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS ecommerce");
    echo "SUCCESS: Database created\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
