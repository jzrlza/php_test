<?php

require_once __DIR__ . '/vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

// Serve CSS file
if ($request === __DIR__ . '/src/style.css') {
    header('Content-Type: text/css');
    readfile(__DIR__ . '/src/style.css');
    exit;
}

// Serve JavaScript file
if ($request === __DIR__ . '/src/script.js') {
    header('Content-Type: application/javascript');
    readfile(__DIR__ . '/src/script.js');
    exit;
}

//$loader = new \Twig\Loader\ArrayLoader([
//    'index' => 'Hello {{ name }}!',
//]);
//$twig = new \Twig\Environment($loader);

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src');
$twig = new \Twig\Environment($loader);
//$twig = new \Twig\Environment($loader, [
//    'cache' => __DIR__ . '/compilation_cache',
//]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle fetch request
    $requestData = json_decode(file_get_contents('php://input'), true);

    //error_log($requestData)
    //print $requestData

    //echo $requestData;

    // Process the data
    $response = [
        'status' => 'success',
        'message' => $requestData['key'] ?? 'No key received',
    ];

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Render Twig template
    $data = [
        'name' => 'Amogus',
        'post' => $_POST,
        'uri' => $_SERVER['REQUEST_URI'],
    ];

    // Render the Twig template
    echo $twig->render('index.php', $data);
}