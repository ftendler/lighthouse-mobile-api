<?php

header('Content-Type: application/json; charset=utf-8');

echo json_encode([
    'sucesso' => true,
    'api' => 'Lighthouse Mobile API',
    'status' => 'online',
    'versao' => '1.0.0'
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
