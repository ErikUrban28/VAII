<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Article;

class ArticlesController extends AControllerBase
{

    public function index(): Response
    {
        return $this->redirect('?c=articles&a=articles');
    }
    public function articles(): Response
    {
        $articles = Article::getAll();
        return $this->html($articles);
    }
}