<?php

namespace App\Controllers;

use App\Models\Recipe;
class RecipeController
{
    public function __construct(protected $twig, protected $recipe)
    {
    }

public function index()
{
    header('Content-Type: application/json');
    echo $this->recipe->all();
}


    public function post()
    {
        header('Content-Type: application/json');
        echo $this->recipe->post();
    }

    public function delete()
    {
        header('Content-Type: application/json');
        echo $this->recipe->delete();
    }
}
