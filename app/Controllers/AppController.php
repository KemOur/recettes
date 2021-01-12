<?php

namespace App\Controllers;

class AppController
{
    public function __construct(protected $twig)
    {
    }

    public function index()
    {
        echo $this->twig->render('index.html');
    }
    }
