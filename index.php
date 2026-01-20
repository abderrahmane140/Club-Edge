<?php

require_once __DIR__ . '/src/core/Database.php';

try {
    $pdo = Database::getConnection();
    echo "Database connected successfully";
} catch (PDOException $e) {
    echo "X connection failed: " . $e->getMessage();
}
