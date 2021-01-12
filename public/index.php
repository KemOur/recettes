<?php

use App\Repositories\RecipeRepository;

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

try {
    $pdo = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
} catch (PDOException $e) {
    die($e->getMessage());
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$lexer = new \Twig\Lexer($twig, [
    'tag_comment'   => ['{#', '#}'],
    'tag_block'     => ['{%', '%}'],
    'tag_variable'  => ['[[', ']]'],
    'interpolation' => ['#{', '}'],
]);
$twig->setLexer($lexer);

$recipe = new RecipeRepository($pdo);

require __DIR__ . "/../app/router.php";
