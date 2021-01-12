<?php

use App\Controllers\AppController;
use App\Controllers\RecipeController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);

$appController = new AppController($twig);
$recipeController = new RecipeController($twig, $recipe);

switch ($method) {
    case 'get':
        switch ($uri) {
            case '/':
                $appController->index();
                break;
            case '/api':
                $recipeController->index();
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    case 'post':
        switch ($uri) {
            case '/api':
                $recipeController->post();
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    case 'delete':
        switch ($uri) {
            case '/api':
                $recipeController->delete();
                break;
            default:
                http_response_code(404);
                break;
        }
        break;
    default:
        http_response_code(405);
        break;
}
