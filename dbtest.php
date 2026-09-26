<?php

header('Content-Type: application/json; charset=utf-8');

try {

    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');

    if (!$host || !$dbname || !$user) {
        throw new Exception('Variáveis de banco não configuradas.');
    }

    $pdo = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 10
        ]
    );

    $stmt = $pdo->query("SELECT 1 AS teste");
    $resultado = $stmt->fetch();

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Render conseguiu conectar ao MySQL.',
        'banco' => $dbname,
        'teste' => $resultado['teste'] ?? null
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Falha na conexão com o MySQL.',
        'erro' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

exit;
