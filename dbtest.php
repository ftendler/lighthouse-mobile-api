<?php

header('Content-Type: application/json; charset=utf-8');

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');

echo json_encode([
    'sucesso' => true,
    'getenv' => [
        'DB_HOST' => $host !== false && $host !== '',
        'DB_NAME' => $dbname !== false && $dbname !== ''
    ],
    'server' => [
        'DB_HOST' => isset($_SERVER['DB_HOST']) && $_SERVER['DB_HOST'] !== '',
        'DB_NAME' => isset($_SERVER['DB_NAME']) && $_SERVER['DB_NAME'] !== ''
    ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

exit;
