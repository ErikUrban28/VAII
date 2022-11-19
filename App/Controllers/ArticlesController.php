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

    public function delete()
    {
        $postToDelete = Article::getOne($this->request()->getValue('id'));
        $postToDelete?->delete();
        return $this->redirect("?c=articles");
    }

    public function create()
    {
        return $this->html(new Article(),viewName: 'articleForm');
    }

    public function store()
    {
        //todo: kontrolovat id
        $id = $this->request()->getValue('id');
        $article = $id ? Article::getOne($id) : new Article();
        $article->setText($this->request()->getValue('text'));
        $article->setTitle($this->request()->getValue('title'));
        $article->save();
        return $this->redirect("?c=articles");
    }

    public function edit()
    {
        //todo: kontrolovat id
        $postToEdit= Article::getOne($this->request()->getValue('id'));
        return $this->html($postToEdit, viewName: 'articleForm');
    }
}